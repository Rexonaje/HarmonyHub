<?php
 namespace Model;
 class Alumnos extends ActiveRecord{
    protected static $tabla='alumnos';
    protected static $columnasBD=['alumnos_id','nombre','asignaciones_asignaciones_id','comentarios'];

    public $alumnos_id;
    public $nombre;
    //public $asignaciones_asignaciones_id;
    public $comentarios;

    public function __construct($args=[])
    {
        $this->alumnos_id=$args['alumnos_id'];
        $this->nombre=$args['nombre'];
        //$this->asignaciones_asignaciones_id=$args['asignaciones_asignaciones_id'];
        $this->comentarios=$args['comentarios'];
    }
 }