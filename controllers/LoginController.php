<?php
    namespace Controllers;
    use Model\Usuario;
    use MVC\Router;

    class LoginController
    {
        public static function login(Router $router ){
            $errores=[];
            if($_SERVER['REQUEST_METHOD']==='POST'){
             $auth=new Usuario($_POST); 
             $errores=$auth->validar();

             if(!$errores){
                $resultado=$auth->existeUsuario();
                if(!$resultado){
                    $errores=Usuario::getErrores();

                }else{
                    $autenticado=$auth->comprobarPassword($resultado);
                    if($autenticado){
                        $auth->autenticarUsuario();
                    }else{
                        $errores=Usuario::getErrores();
                    }
                }
             }
            }

            $router->render('auth/login',[ 
                'errores'=>$errores
            ]);
        }
        
        public static function logout(Router $router){
            session_start();
            
            $_SESSION=[];//limpia los datos del arreglo para borrar al sesion
            header('location: /');
            
        }
        public static function user(Router $router){
            //no sera necesario despues
            $router->render('auth/userCreator',[]);
        }
    }
?>