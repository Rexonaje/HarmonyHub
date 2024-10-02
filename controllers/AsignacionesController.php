<?php
namespace Controllers;
use MVC\Router;
use Model\Asignaciones;
use Model\Alumnos;

 
//maneja  asignaciones
class AsignacionesController {
    public static function asignaciones(Router $router ){
       
            $dia="Lunes"; 

            // Toma el valor del día desde la URL si está presente
            if (isset($_GET['dia'])) {
                $dia = $_GET['dia'];
            }

            $alumnos=[];
          
             //toma el  value del titulo para filtrar asignacion con metodo post
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $dia=$_POST['dias'];
            }
            //almacena en una var los alumnos del dia actual
            $asignaciones=Asignaciones::findByColumn("dia_semana",$dia); 
            
            //array de obj con alumnos del $dia
            //debugear($asignaciones,false);
            foreach( $asignaciones as $a){
                $alumno=Alumnos::findByColumn("id",$a->alumno_id);
                array_push($alumnos,$alumno[0]);
                //debugear($alumno,false);
            }
            
        $router->render('asignaciones',[
            'asignaciones'=>$asignaciones,
            'alumnos'=>$alumnos,
            'dia'=>$dia,
         //   'horariosDelDia'=>$horariosDelDia
             
        ]);
    }

   
    
}