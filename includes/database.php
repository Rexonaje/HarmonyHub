<?php


function conectarDB() : mysqli{
    $DB=new mysqli($_ENV['BD_HOST'],$_ENV['BD_USER'],$_ENV['BD_PASSWORD'],$_ENV['BD_NAME'],);
    //$DB->set_charset('UTF-8');
    if(!$DB){
        echo "error de Conexion";
        exit;
    } 
    return $DB;
};