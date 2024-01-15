<?php

use Plugo\Router\Router;

require dirname(__DIR__) . '/lib/autoload.php';
session_start();
new Router();