<?php

namespace Model;
use Model\ActiveRecord;
   class Canciones extends ActiveRecord {
    protected static $tabla='canciones';
    protected static $columnasBD=['id','titulo','alumno_id'];

        public $id;
        public $titulo;
        public $alumno_id;
        public function __construct($args=[])
        {
            $this->id=$args['id']??null;
            $this->titulo=$args['titulo']??'Añadir cancion';
            $this->alumno_id=$args['alumno_id']??null;
        }
}