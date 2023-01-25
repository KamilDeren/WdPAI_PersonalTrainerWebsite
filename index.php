<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('index', 'DefaultController');
Router::get('offer', 'DefaultController');
Router::get('signup', 'DefaultController');
Router::get('login', 'DefaultController');
Router::post('login', 'SecurityController');


Router::run($path);