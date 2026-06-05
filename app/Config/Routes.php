<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'ShortUrlController::index');
$routes->post('/shorten', 'ShortUrlController::shorten');

$routes->options('api/shorten', static function () {
    return service('response')->setStatusCode(204);
});

$routes->post('api/shorten', 'ShortUrlController::apiShorten');

$routes->get('/(:segment)', 'ShortUrlController::redirectToOriginal/$1');
