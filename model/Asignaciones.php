<?php
namespace Model;
 class Asignaciones  extends ActiveRecord{
   protected static $tabla='asignaciones';
   protected static $columnasBD=['id','dia_semana','horario','alumno_id'];

      public $id;
      public $dia_semana;
      public $horario;
      public $alumno_id;

 public function __construct($args=[])
 {
    $this->id=$args['id']?? null;
    $this->dia_semana=$args['dia_semana']?? '';
    $this->horario=$args['horario']?? null;
    $this->alumno_id=$args['alumno_id']?? null;
 }
 }