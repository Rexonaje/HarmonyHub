<?php

 namespace Model;
 class Alumnos extends ActiveRecord{
    protected static $tabla='alumnos';
    protected static $columnasBD=['id','nombre','comentarios'];

    public $id;
    public $nombre;
    public $comentarios;
    public $canciones=[];//inyectar en el array el valor de titulo en la tabla canciones

    public function __construct($args=[])
    {
        $this->id=$args['id']?? null;
        $this->nombre=$args['nombre']?? 'Añadir Nombre';
         
        $this->comentarios=$args['comentarios'] ?? 'Añadir Comentario';
    }
 }