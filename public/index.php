<?php 
include_once __DIR__ . '/../includes/app.php';

use Controllers\AlumnosController;
use MVC\Router;
use Controllers\AsignacionesController;

$router =new Router();
//get
$router->get('/asignaciones',[AsignacionesController::class,'asignaciones']);
$router->get('/alumnos/alumno',[AlumnosController::class,'alumnos']);
$router->get('/alumnos/crear',[AlumnosController::class,'AgregarAlumno']);
$router->get('/alumnos/canciones',[AlumnosController::class,'AgregarCancion']);
$router->get('/alumnos/borrarAlumno',[AlumnosController::class,'borrarAlumno']);
$router->get('/',[AsignacionesController::class,'login']);
//post
$router->post('/asignaciones',[AsignacionesController::class,'asignaciones']);
$router->post('/alumnos/alumno',[AlumnosController::class,'alumnos']);
$router->post('/alumnos/crear',[AlumnosController::class,'AgregarAlumno']);
$router->post('/alumnos/canciones',[AlumnosController::class,'AgregarCancion']);
$router->post('/alumnos/borrarAlumno',[AlumnosController::class,'borrarAlumno']);
$router->post('/',[AsignacionesController::class,'login']);
$router->comprobarRutas();     