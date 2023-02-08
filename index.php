<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('index', 'DefaultController');
Router::get('offer', 'DefaultController');
Router::get('register', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('contact', 'DefaultController');
Router::get('about', 'DefaultController');
Router::get('addtraining', 'DefaultController');
Router::get('trainings', 'TrainingController');

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('addTraining', 'TrainingController');

Router::run($path);
