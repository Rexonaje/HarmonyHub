<?php 
include_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\HorariosController;

$router =new Router();
$router->get('/horarios',[HorariosController::class,'horarios']);
$router->get('/alumnos',[HorariosController::class,'alumnos']);
$router->get('/',[HorariosController::class,'login']);
$router->comprobarRutas();