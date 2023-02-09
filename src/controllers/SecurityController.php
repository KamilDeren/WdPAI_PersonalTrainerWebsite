<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function myaccount()
    {
        $myuser = $this->userRepository->getUserById(3);
        $this->render('myaccount', ['myaccount' => $myuser]);
    }

    public function login()
    {
        session_start();
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login-page');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        try{
            $user = $userRepository->getUser($email);
        }
        catch (Exception $e){
            return $this->render('login-page', ['messages' => ['User with this email not exist!']]);
        }

        if (!$user) {
            return $this->render('login-page', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login-page', ['messages' => ['Wrong email!']]);
        }

        if ($user->getPassword() !== md5($password)) {
            return $this->render('login-page', ['messages' => ['Wrong password!']]);
        }

        $_SESSION['id'] = $user->getId();
        return $this->render('index-page');
    }

    public function logout(){
        session_start();
        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
        return $this->render('index-page');
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register-page');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['rpassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone_number'];
        $sex = $_POST['sex'];
        $city = $_POST['city'];

        if ($password !== $confirmedPassword) {
            return $this->render('register-page', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, md5($password), $name, $surname, $city, $sex, $phone);

        $this->userRepository->addUser($user);

        return $this->render('login-page', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}