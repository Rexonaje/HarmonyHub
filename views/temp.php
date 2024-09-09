<?php foreach($asignaciones as $asginacion) :?>
            <div class="horarios__fila">
                <div class="horario__alumno">
                    <p>
                        <a href="/alumnos?alumnoId=<?php echo $asginacion->alumno_id;?> ">
                            <?php 
                            foreach ($alumnos as $alumno) {
                                if ($alumno->alumnos_id === $asginacion->alumno_id) {
                                    echo $alumno->nombre;
                                    break;
                                }
                            }
                            ?>
                        </a>
                    </p> 
                    <button id="btnPresentismo"  class="presente boton-verde">Presente</button>
                    <button class="horario__borrar" >
                        <?php @includirTemplate("deleteButton"); ?>
                    </button>
                </div><!--horario alumno -->
                <br>
            </div><!--horario fila -->
        <?php endforeach;?>