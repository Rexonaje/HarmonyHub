<?php

namespace Model;
use Model\ActiveRecord;
   class Canciones extends ActiveRecord {
    protected static $tabla='canciones';
    protected static $columnasBD=['canciones_id','titulo','alumno_id'];

        public $canciones_id;
        public $titulo;
        public $alumno_id;
        public function __construct($args=[])
        {
            $this->canciones_id=$args['canciones_id']??null;
            $this->titulo=$args['titulo']??'Añadir cancion';
            $this->alumno_id=$args['alumno_id']??null;
        }
}