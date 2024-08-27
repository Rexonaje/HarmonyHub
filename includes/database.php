<?php
//$bd=mysqli_connect('localhost','root','root','teachflow');
$bd="conected";
if(!$bd){
    echo "error de conexion con bd";
    exit;
}