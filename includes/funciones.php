<?php
 define('TEMPLATES_URL',__DIR__ . '/templates');
 define('FUNCIONES_URL',__DIR__ . 'functiones.php');


 if (!function_exists('includirTemplate')) {
    function includirTemplate(string $nombre, bool $inicio = false) {
        include TEMPLATES_URL . "/$nombre.php";
    }
}

if(!function_exists('debugear')){
    function debugear( $variable,$exit=true){
        echo '<pre>';
            var_dump($variable);
        echo '</pre>';
    if($exit){
            exit;     
        } 
    }
}