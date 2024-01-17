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
    '/profil' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'profil',
        'name' => 'app_profil'
    ],
    '/roadtrips' => [
        'controller' => App\Controller\RoadtripController::class,
        'method' => 'list',
        'name' => 'app_roadtrips'
    ],
    '/roadtrip/ajouter' => [
        'controller' => App\Controller\RoadtripController::class,
        'method' => 'add',
        'name' => 'app_roadtrip_add'
    ],
    '/roadtrip/{id}' => [
        'controller' => App\Controller\RoadtripController::class,
        'method' => 'show',
        'name' => 'app_roadtrip_show'
    ],
    '/roadtrip/{id}/modifier' => [
        'controller' => App\Controller\RoadtripController::class,
        'method' => 'edit',
        'name' => 'app_roadtrip_edit'
    ],
];
