<?php
namespace MVC;
class Router{
            public $rutasGet=[];
            public $rutasPost=[];
            
            public function get($url,$fn){
                $this->rutasGet[$url]=$fn;
            }
            public function post($url,$fn){
                $this->rutasPost[$url]=$fn;
            }
            public function comprobarRutas(){
            session_start();
            $auth=$_SESSION['login']?? null;

            //arreglo de rutas protegidas
            $rutas_protegidas=[];

            $urlActual=strtok($_SERVER['REQUEST_URI'],'?')?? '/' ; 
            $metodo=$_SERVER['REQUEST_METHOD'];

            if($metodo==='GET'){
                    $urlActual = explode('?',$urlActual)[0];//para evitar que no encuentre la url con ?var
                    $fn=$this->rutasGet[$urlActual]??null;//basado en la pagina q visito hay una funcion asociada
            }else{
                    $urlActual = explode('?',$urlActual)[0];
                    $fn=$this->rutasPost[$urlActual]??null;//basado en la pagina q visito hay una funcion asociada
            }
            //si la url actual esta en la lista de rutas protegidas  da  true 
            if(in_array($urlActual,$rutas_protegidas) && !$auth){
                    header('location: /');
            }



            if($fn){
                //llamar funcion que cuyo nombre no conocemos
                call_user_func($fn,$this);
            }
            else{
                echo "pagina no encontrada";
            }
        }
        //muestra una vista
        public function render($view, $datos=[]){
                foreach($datos as $key =>$value){
                    $$key=$value; //la key que esta en la vista va a mostrar los valores agregados 
                }                                                                                 

            ob_start();//inicia almacenamiento en memoria
            include_once __DIR__ . "/views/$view.php";//almacena en memoria  
            $contenido=ob_get_clean();//limpia esa memoria(evita que colapse el server)
            include_once __DIR__ ."/views/layout.php";
        }
    
}