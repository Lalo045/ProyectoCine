<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/usuario','Usuario::index');
$routes->get('/usuario/salir','Usuario::salir');
$routes->post('/usuario/acceder','Usuario::acceder');

$routes->get('/cuentas','Cuentas::index');
$routes->get('/cuentas/add','Cuentas::add');
$routes->post('/cuentas/insert','Cuentas::insert');
$routes->get('/cuentas/delete/(:num)','Cuentas::delete/$1');
$routes->get('/cuentas/edit/(:num)','Cuentas::edit/$1');
$routes->post('/cuentas/update/','Cuentas::update/');

$routes->get('/empleados','Empleados::index');

$routes->get('/empleados/add','Empleados::add');
$routes->post('/empleados/insert','Empleados::insert');
$routes->get('/empleados/delete/(:num)','Empleados::delete/$1');
$routes->get('/empleados/edit/(:num)','Empleados::edit/$1');
$routes->post('/empleados/update/','Empleados::update/');


$routes->get('/clientes','Clientes::index');

$routes->get('/clientes/add','Clientes::add');
$routes->post('/clientes/insert','Clientes::insert');
$routes->get('/clientes/delete/(:num)','Clientes::delete/$1');
$routes->get('/clientes/edit/(:num)','Clientes::edit/$1');
$routes->post('/clientes/update/','Clientes::update/');

$routes->get('/peliculas', 'Peliculas::index');

$routes->get('/peliculas/add', 'Peliculas::add');
$routes->post('/peliculas/insert', 'Peliculas::insert');
$routes->get('/peliculas/delete/(:num)', 'Peliculas::delete/$1');
$routes->get('/peliculas/edit/(:num)', 'Peliculas::edit/$1');
$routes->post('/peliculas/update', 'Peliculas::update');


$routes->get('/salas', 'Salas::index');

$routes->get('/salas/add', 'Salas::add');

$routes->post('/salas/insert', 'Salas::insert');
$routes->get('/salas/delete/(:num)', 'Salas::delete/$1');
$routes->get('/salas/edit/(:num)', 'Salas::edit/$1');
$routes->post('/salas/update', 'Salas::update');

$routes->get('/funciones', 'Funciones::index');
$routes->get('funciones', 'Funciones::index');

$routes->get('/funciones/add', 'Funciones::add');
$routes->post('/funciones/insert', 'Funciones::insert');
$routes->get('/funciones/delete/(:num)', 'Funciones::delete/$1');
$routes->get('/funciones/edit/(:num)', 'Funciones::edit/$1');
$routes->post('/funciones/update', 'Funciones::update');

$routes->get('/ventas', 'Ventas::index');

$routes->get('/ventas/add', 'Ventas::add');


$routes->post('/ventas/insert', 'Ventas::insert');
$routes->get('/ventas/delete/(:num)', 'Ventas::delete/$1');
$routes->get('/ventas/edit/(:num)', 'Ventas::edit/$1');
$routes->post('/ventas/update/(:num)', 'Ventas::update/$1');

$routes->get('/precioEntrada', 'PrecioEntrada::index');

$routes->get('/precioEntrada/add', 'PrecioEntrada::add');
$routes->post('/PrecioEntrada/insert', 'PrecioEntrada::insert');
$routes->get('/precioEntrada/delete/(:num)', 'PrecioEntrada::delete/$1');
$routes->get('/precioEntrada/edit/(:num)', 'PrecioEntrada::edit/$1');
$routes->post('/precioEntrada/update', 'PrecioEntrada::update');

$routes->get('/asientos', 'Asientos::index');

$routes->get('/asientos/add', 'Asientos::add');
$routes->post('/asientos/insert', 'Asientos::insert');
$routes->get('/asientos/delete/(:num)', 'Asientos::delete/$1');




$routes->get('/proveedor','Proveedor::index');
$routes->get('/categoria','Categoria::index');



$routes->get('/proveedor/add','Proveedor::add');

$routes->post('/marcas/insert','Marcas::insert');
$routes->post('/proveedor/insert','Proveedor::insert');

$routes->get('/marcas/edit/(:num)','Marcas::edit/$1');
$routes->post('/marcas/update/','Marcas::update/');


$routes->get('/marcas/delete/(:num)','Marcas::delete/$1');
$routes->get('/categoria/delete/(:num)','Categoria::delete/$1');