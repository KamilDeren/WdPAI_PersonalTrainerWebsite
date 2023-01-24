<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('index');
    }

    public function offer()
    {
        $this->render('offer-view');
    }

    public function login()
    {
        $this->render('log-in-page');
    }

    public function signup()
    {
        $this->render('sign-up-view');
    }


}