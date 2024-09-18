<?php
 
namespace Controllers;

use Model\Alumnos;
use Model\Asignaciones;
use Model\Canciones;
use MVC\Router;//maneja tabla alumnos y canciones
    class AlumnosController{
        public static function alumnos(Router $router ){
         //   $alumnos=Alumnos::all();
            $alumnoId=$_GET['alumno_id'];
             
            //TODO mostrar canciones, nombre y comentario filtradas por id de alumno
            $canciones =Canciones::findByColumn('alumno_id', $alumnoId);
            //debugear($canciones,false);
            $alumnos =Alumnos::findByColumn('id', $alumnoId);
            $alumno =array_shift($alumnos) ;

           

            $router->render('alumnos/alumno',[
                'alumno'=>$alumno,
                'canciones'=>$canciones
            ]);
            
        }
        public static function AgregarCancion(Router $router){
            //TODO agregar canciones con method post
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $cancion=new Canciones($_POST['cancion']);
                $cancion->guardar(true,);
            }

            $router->render('alumnos/canciones',[]);
        }
        public static function AgregarAlumno(Router $router){
            $alumno=new Alumnos();
            if($_SERVER['REQUEST_METHOD']==='POST'){
                // tomar value de nombre y comentario
                
                $alumno=new Alumnos($_POST['alumno']);
                $alumno->guardar(false);
              
                // obtener id de alumno agregado/mas dia y horario 
                $alumno=Alumnos::findByColumn('nombre',$alumno->nombre);
                 
                $horario=$_GET['horario'];
                $dia_semana=$_GET['dia'];
                // enviar datos [dia,horario,alumnoID] a la tabla asignaciones
                    $asignacion=new Asignaciones();
                    $asignacion->dia_semana=$dia_semana;
                    $asignacion->horario=$horario;
                    $asignacion->alumno_id=$alumno[0]->id;
                    //debugear($asignacion->alumno_id);
                $asignacion->guardar(true);
            }
            $router->render('alumnos/crear',[
                'alumno'=>$alumno
            ]);
        }
        public static function ModificarAlumno(Router $router){
            //TODO edit nombre y comentario con method post
            //TODO obtener values
            
            //TODO enviar a la base
           
        }
        public static function EliminarAlumno(Router $router){
            //TODO obtener alumno Id
            //TODO borrar de la tabla alumnos where AlumnoID
            //TODO borrar de la tabla asignaciones where AlumnoID
           
        }
    }
    ?>