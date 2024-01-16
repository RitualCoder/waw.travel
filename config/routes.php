<?php

const ROUTES = [
    '/' => [
        'controller' => App\Controller\MainController::class,
        'method' => 'home',
        'name' => 'app_home'
    ],

    '/connexion' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'login',
        'name' => 'app_login'
    ],

    '/inscription' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'register',
        'name' => 'app_register'
    ],

    '/deconnexion' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'logout',
        'name' => 'app_logout'
    ],
    'ajouter' => [
        'controller' => App\Controller\RoadtripController::class,
        'method' => 'add',
        'name' => 'app_add'
    ],

    '/profil' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'profil',
        'name' => 'profil'
    ],
];
