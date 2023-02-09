<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('index-page');
    }

    public function offer()
    {
        $this->render('offer-page');
    }

    public function login()
    {
        $this->render('login-page');
    }

    public function register()
    {
        $this->render('register-page');
    }


    public function contact()
    {
        $this->render('contact-page');
    }

    public function about()
    {
        $this->render('about-page');
    }
    public function addtraining()
    {
        $this->render('addtraining-page');
    }

    public function myaccount()
    {
        $this->render('myaccount-page');
    }

}