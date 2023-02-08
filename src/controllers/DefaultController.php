<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('index');
    }

    public function offer()
    {
        $this->render('offer');
    }

    public function login()
    {
        $this->render('login');
    }

    public function signup()
    {
        $this->render('signup');
    }


    public function contact()
    {
        $this->render('contact');
    }

    public function about()
    {
        $this->render('about');
    }
    public function addtraining()
    {
        $this->render('addtraining');
    }
    public function trainings()
    {
        $this->render('trainings');
    }
}