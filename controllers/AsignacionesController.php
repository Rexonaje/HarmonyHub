<?php
namespace Controllers;
use MVC\Router;
use Model\Asignaciones;
use Model\Alumnos;

 
//maneja  asignaciones
class AsignacionesController {
    public static function asignaciones(Router $router ){
            //TODO tomar value del titulo para filtrar asignacion

            //almacena en una var los alumnos del dia actual
            $asignacion=Asignaciones::findByColumn("dia_semana","miercoles"); //debugear($asignacion);
            //TODO pasar id  de estos alumnos a  /alumnos a traves  de url?id=number; agregar un por defecto para cuando no existe alumno 
           
            $alumnos=Alumnos::all();    
           

        $router->render('asignaciones',[
            'asignacion'=>$asignacion,
            'alumnos'=>$alumnos
             
        ]);
    }

    public static function login(Router $router ){
        $router->render('login',[]);
    }
    
    
}