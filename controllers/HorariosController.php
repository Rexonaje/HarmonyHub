<?php
namespace Controllers;
use MVC\Router;

 

class HorariosController {
    public static function horarios(Router $router ){
 
        $router->render('horarios',[]);
    }
    public static function alumnos(Router $router ){
        $router->render('alumnos',[]);
    }
    public static function login(Router $router ){
        $router->render('login',[]);
    }
    
    
}