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
            $dia = $_GET['dia']; 
            $mensaje='';
            //TODO mostrar canciones, nombre y comentario filtradas por id de alumno
            $canciones =Canciones::findByColumn('alumno_id', $alumnoId);
            //debugear($canciones,false);
            $alumnos =Alumnos::findByColumn('id', $alumnoId);
            $alumno =array_shift($alumnos) ;

            if($_SERVER['REQUEST_METHOD']==='POST'){
                // tomar value de nombre y comentario
                $dia = $_GET['dia']; 
                $alumno->nombre=trim($_POST['alumno']['nombre']);
                if(empty($alumno->nombre)){
                    $mensaje="nombre vacio";
                }else{

                    $alumno->comentarios=$_POST['alumno']['comentarios'];
                    $alumno->guardar(true,'/asignaciones?dia='.$dia);
                }
                 
              
            }
           

            $router->render('alumnos/alumno',[
                'alumno'=>$alumno,
                'canciones'=>$canciones,
                'dia'=>$dia,
                'mensaje' => $mensaje
            ]);
            
        }/*
        public static function AgregarCancion(Router $router){
            //TODO agregar canciones con method post
            $alumnoId=$_GET['alumno_id'];
            $horario=$_GET['horario'];
            $dia = $_GET['dia']; 
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $cancion=new Canciones($_POST['cancion']);
                $cancion->guardar(true, '/alumnos/alumno?alumno_id=' . $alumnoId .'&horario='. $horario .  '&dia=' .$dia  );
            }
            $alumno =Alumnos::findByColumn('id', $alumnoId);
            $router->render('alumnos/canciones',[
                'alumnoNombre'=>$alumno, 
                'horario'=>$horario, 
                'dia'=>$dia
            ]);
        }*/
        public static function AgregarCancion(Router $router) {
            $alumnoId = $_GET['alumno_id'];
            $horario = $_GET['horario'];
            $dia = $_GET['dia'];
            $mensaje = '';
            
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

                $tituloCancion = trim($_POST['cancion']['titulo']);
               // debugear($tituloCancion);
                if (!empty($tituloCancion)) {
                    // Sanitizar el título de la canción
                    $tituloCancion = htmlspecialchars($tituloCancion, ENT_QUOTES, 'UTF-8');
                    $cancion = new Canciones();
                    $cancion->titulo=$tituloCancion;  // Asignar el título sanitizado
                    $cancion->alumno_id=$alumnoId;  // Asignar el título sanitizado
                    $cancion->guardar(true, '/alumnos/alumno?alumno_id=' . $alumnoId . '&horario=' . $horario . '&dia=' . $dia);
                } else {
                    $mensaje = 'El campo de la canción no puede estar vacío.';
                }
            }
            
            $alumno = Alumnos::findByColumn('id', $alumnoId);
            
            $router->render('alumnos/canciones', [
                'alumnoNombre' => $alumno,
                'horario' => $horario,
                'dia' => $dia,
                'mensaje' => $mensaje
            ]);
        }
        
        public static function AgregarAlumno(Router $router){
            $alumno=new Alumnos();
            $dia = $_GET['dia']; 
            $mensaje='';
            if($_SERVER['REQUEST_METHOD']==='POST'){
                // tomar value de nombre y comentario
                
                    $alumno=new Alumnos($_POST['alumno']);
                    $alumno->nombre=trim($_POST['alumno']['nombre']);
                    if(empty( $alumno->nombre)){
                        $mensaje="nombre esta vacio";
                    }else{
                        $alumno->guardar(false);
                        $alumno=Alumnos::findByColumn('nombre',$alumno->nombre);

                        // obtener id de alumno agregado/mas dia y horario 
                        
                        $horario=$_GET['horario'];
                        $dia_semana=$_GET['dia'];
                        // enviar datos [dia,horario,alumnoID] a la tabla asignaciones
                            $asignacion=new Asignaciones();
                            $asignacion->dia_semana=$dia_semana;
                            $asignacion->horario=$horario;
                            $asignacion->alumno_id=$alumno[0]->id;
                            //debugear($asignacion->alumno_id);
                        $asignacion->guardar(true,'/asignaciones?dia='.$dia);
                    }
                }
                 
              
            $router->render('alumnos/crear',[
                'alumno'=>$alumno,
                'dia'=>$dia,
                'mensaje'=>$mensaje
            ]);
        }
        
        public static function borrarAlumno(Router $router){
            //TODO obtener alumno Id
            $dia=$_GET['dia'];
            if($_SERVER['REQUEST_METHOD']==='POST'):
                $alumnoId=$_GET['alumno_id'];
                $canciones=Canciones::findByColumn('alumno_id',$alumnoId);
                if(count($canciones)){
                    debugear($canciones,false );

                    for($i=0;$i<count($canciones);$i++){
                        
                        $canciones[$i]->eliminar(false);
                    }
                }   
                
                $asignacion=Asignaciones::findByColumn('alumno_id',$alumnoId);
                $asignacion[0]->eliminar(false);
            


                $alumno =Alumnos::findByColumn('id', $alumnoId);
                $alumno[0]->eliminar(true,'/asignaciones?dia=' . $dia);
            endif;
             
           $router->render('alumnos/borrarAlumno',[
            'dia'=>$dia
           ]);
        }
    }
    ?>