<?php
include_once(__DIR__.'/../includes/app.php');

use MVC\Router;
use Controllers\PaginasController;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\UsuarioController;

$router = new Router();

//Páginas
$router->get('/',[PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/anuncios', [PaginasController::class, 'anuncios']);
$router->get('/anuncio', [PaginasController::class, 'anuncio']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

//Propiedad
$router->get('/admin', [PropiedadController::class, 'admin']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

//Vendedor
$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

//Usuarios
$router->get('/login', [UsuarioController::class, 'login']);
$router->post('/login', [UsuarioController::class, 'login']);
$router->get('/logout', [UsuarioController::class, 'logout']);

$router->comprobarRutas();