<?php
namespace Controllers;
use MVC\Router;
use Model\Asignaciones;
use Model\Alumnos;

 
//maneja  asignaciones
class AsignacionesController {
    public static function asignaciones(Router $router ){
            $dia="Miercoles";
            $alumnos=[];
           // $horariosDelDia=["1","2","3","4","5"];
             //toma el  value del titulo para filtrar asignacion con metodo post
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $dia=$_POST['opciones'];
            }
            //almacena en una var los alumnos del dia actual
            $asignaciones=Asignaciones::findByColumn("dia_semana",$dia); 
            
           //array de obj con alumnos del $dia
            
           foreach( $asignaciones as $asignacion){
            $alumno=Alumnos::findByColumn("alumnos_id",$asignacion->alumno_id);
            array_push($alumnos,$alumno[0]);
           }
        $router->render('asignaciones',[
            'asignaciones'=>$asignaciones,
            'alumnos'=>$alumnos,
            'dia'=>$dia,
         //   'horariosDelDia'=>$horariosDelDia
             
        ]);
    }

    public static function login(Router $router ){
        $router->render('login',[]);
    }
    
    
}