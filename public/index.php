<?php 
include_once __DIR__ . '/../includes/app.php';

use Controllers\AlumnosController;
use MVC\Router;
use Controllers\AsignacionesController;

$router =new Router();
//get
$router->get('/asignaciones',[AsignacionesController::class,'asignaciones']);
$router->get('/alumnos',[AlumnosController::class,'alumnos']);
$router->get('/',[AsignacionesController::class,'login']);
//post
$router->post('/asignaciones',[AsignacionesController::class,'asignaciones']);
$router->post('/alumnos',[AlumnosController::class,'alumnos']);
$router->post('/',[AsignacionesController::class,'login']);
$router->comprobarRutas();     