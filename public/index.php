<?php 
include_once __DIR__ . '/../includes/app.php';

use Controllers\AlumnosController;
use MVC\Router;
use Controllers\AsignacionesController;
use Controllers\LoginController;

$router =new Router();
//asignaciones
$router->get('/asignaciones',[AsignacionesController::class,'asignaciones']);
$router->post('/asignaciones',[AsignacionesController::class,'asignaciones']);

//alumnos
$router->get('/alumnos/alumno',[AlumnosController::class,'alumnos']);
$router->post('/alumnos/alumno',[AlumnosController::class,'alumnos']);

$router->get('/alumnos/crear',[AlumnosController::class,'AgregarAlumno']);
$router->post('/alumnos/crear',[AlumnosController::class,'AgregarAlumno']);

$router->get('/alumnos/canciones',[AlumnosController::class,'AgregarCancion']);
$router->post('/alumnos/canciones',[AlumnosController::class,'AgregarCancion']);

$router->get('/alumnos/borrarAlumno',[AlumnosController::class,'borrarAlumno']);
$router->post('/alumnos/borrarAlumno',[AlumnosController::class,'borrarAlumno']);
 
//login
$router->get('/',[LoginController::class,'login']);
$router->post('/',[LoginController::class,'login']);

$router->post('/auth/userCreator',[LoginController::class,'user']);
$router->get('/auth/userCreator',[LoginController::class,'user']);
$router->get('/logout',[LoginController::class,'logout']);
$router->comprobarRutas();     