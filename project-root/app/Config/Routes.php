<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'personajesController::index');
$routes->post('/api/insert', 'personajesController::insertar');
$routes->post('/api/delete', 'personajesController::eliminar');
$routes->post('/api/update', 'personajesController::actualizar');

