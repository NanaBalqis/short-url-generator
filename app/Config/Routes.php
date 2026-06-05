<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'ShortUrlController::index');
$routes->post('/shorten', 'ShortUrlController::shorten');
$routes->get('/(:segment)', 'ShortUrlController::redirectToOriginal/$1');
