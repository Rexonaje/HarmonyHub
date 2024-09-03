<?php
 
namespace Controllers;

use Model\Alumnos;
use Model\Canciones;
use MVC\Router;//maneja tabla alumnos y canciones
    class AlumnosController{
        public static function alumnos(Router $router ){
         //   $alumnos=Alumnos::all();
            $alumnoId=$_GET['alumnoId'];
             
            //TODO mostrar canciones, nombre y comentario filtradas por id de alumno
            $canciones =Canciones::findByColumn('alumno_id', $alumnoId);
            //debugear($canciones,false);
            $alumnos =Alumnos::findByColumn('alumnos_id', $alumnoId);
            $alumno =array_shift($alumnos) ;

           

            $router->render('alumnos',[
                'alumno'=>$alumno,
                'canciones'=>$canciones
            ]);
            
        }
        public static function agregarCancion(Router $router){
            //TODO agregar canciones con method post
            //TODO tomar datos del input
            //TODO sanitizar
            //TODO inyectarlo a la base al apretar el boton +
            
        }
        public static function ModificarAlumno(Router $router){
            //TODO edit nombre y comentario con method post
            //TODO obtener values
            //TODO sanitizar
            //TODO enviar a la base
           
        }
    }
?>