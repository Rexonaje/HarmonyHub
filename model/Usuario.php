<?php

namespace Model;
use Model\ActiveRecord;
   class Usuario extends ActiveRecord {
    protected static $tabla='usuarios';
    protected static $columnasBD=['id','email','password'];

        public $id;
        public $email;
        public $password;
        public function __construct($args=[])
        {
            $this->id=$args['id']??null;
            $this->email=$args['email']??'';
            $this->password=$args['password']??'';
        }
        public function validar()
        {
            if(!$this->email){
                self::$errores[]='Email incorrecto';
            }
            if(!$this->password){
                self::$errores[]='Password incorrecto';
            }
            return self::$errores;//self xque extiende de active record class
        }
        //validar que exista
        public function existeUsuario(){
            $query="SELECT * FROM " . self::$tabla . " WHERE email ='" . $this->email . "' LIMIT 1";
            $resultado=self::$db->query($query);
            if(!$resultado->num_rows){
                self::$errores[]='el usuario no existe';
                return;
               }
               return $resultado;
        }
        public function comprobarPassword($resultado){
            $user=$resultado->fetch_object();
            $validar=password_verify($this->password,$user->password);
            if(!$validar){
                self::$errores[]='password incorrecta';
            }
            return $validar;
        }
        public function autenticarUsuario(){
            session_start();
            $_SESSION['usuario']=$this->email;
            $_SESSION['login']=true;
            header('location: /asignaciones');
        }
}