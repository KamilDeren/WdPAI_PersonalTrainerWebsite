<?php

class User {
    private $name;
    private $surname;
    private $email;
    private $password;
    private $id_user_details;
    private $user_role;


    public function __construct(
        string $email,
        string $password,
        string $name,
        string $surname,
        string $id_user_details,
        string $user_role
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->id_user_details = $id_user_details;
        $this->user_role = $user_role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}