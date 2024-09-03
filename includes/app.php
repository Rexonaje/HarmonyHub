<?php 

//conexion a bd?  con active record? 
use Dotenv\Dotenv;
use Model\ActiveRecord;
require __DIR__ . "/../vendor/autoload.php";//CLASES
$dotenv=Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';
require __DIR__ .'/../vendor/autoload.php';
$bd=conectarDB();

ActiveRecord::setDB($bd);