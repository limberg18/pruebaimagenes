<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get("/listar","Libros::listar");
$routes->get('/crear','Libros::crear');
$routes->Post('/guardar','Libros::guardar');
$routes->get('/borrar','Libros::borrar');
$routes->get('/editar','Libros::editar');
$routes->Post('/actualizar','Libros::actualizar');
