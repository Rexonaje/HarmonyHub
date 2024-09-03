<?php
/*
$bd=mysqli_connect('localhost','root','root','harmonyhub_db_crud');
//$bd="conected";
if(!$bd){
    echo "error de conexion con bd";
    exit;
}*/


function conectarDB() : mysqli{
    $DB=new mysqli($_ENV['BD_HOST'],$_ENV['BD_USER'],$_ENV['BD_PASSWORD'],$_ENV['BD_NAME'],);
    //$DB->set_charset('UTF-8');
    if(!$DB){
        echo "error de Conexion";
        exit;
    } 
    return $DB;
};