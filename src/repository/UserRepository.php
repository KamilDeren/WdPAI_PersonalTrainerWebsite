<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id_user,
                   name,
                   surname,
                   email,
                   password,
                   city_name,
                   phone_number,
                   sex
            FROM public.user_details
            JOIN public.users ON public.users.id_user_details = public.user_details.id_user_details
            JOIN public.cities ON public.cities.id_city = public.user_details.city
            WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            throw new Exception('User with that email doesn\'t exist');
        }


        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['city_name'],
            $user['sex'],
            $user['phone_number'],
            $user['id_user']
        );
    }

    public function addUser(User $user)
    {
        $cty = $user->getCity();
        $phone = $user->getPhoneNumber();

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.cities (city_name)
            VALUES (?)
        ');

        $stmt->execute([
            $cty
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.user_details (city, phone_number, sex, created_at)
            VALUES ((select id_city from cities where ? like city_name), ?, ?, ?)
        ');

        $stmt->execute([
            $cty,
            $user->getPhoneNumber(),
            $user->getSex(),
            date("Y-m-d h:m:s",time())
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (name, surname, email, password, id_user_details, user_role)
            VALUES (?, ?, ?, ?,(select id_user_details from user_details where ? = phone_number), 2)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword(),
            $phone
        ]);
    }
}