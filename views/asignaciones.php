<main class="contenedor">
<div class="contenedor horarios">
    <form  method="post">
        <h2>Dia: <?php echo $dia;?></h2>
        <div class="horarios__titulo">
            <select id="opciones" name="dias">
            <option value=<?php echo $dia;?> selected hidden ><?php echo $dia;?></option>
                <option value="lunes">Lunes</option>
                <option value="martes">Martes </option>
                <option value="miercoles">Miercoles </option>
                <option value="jueves">Jueves </option>
                <option value="viernes">Viernes </option>
                <option value="sabado">Sabado </option>
            </select>
            <button type="submit" id="btn-dia" class="boton boton-azul">Seleccionar dia</button>
        </div>
    </form>
     <button id="no-presentismo" class="boton-azul">Deshabilitar Presentismo</button>
    <div class="horarios__lista">
    <?php 
    // Define the number of groups and rows per group
    $grupos = 5;
    $rowsPorGroup = 2;
    //debugear($alumnos,false);
    ?>

<?php for ($grupo = 1; $grupo <= $grupos; $grupo++): ?>
    <div class="horarios__grupo">
        <p class="horarios__numero">Horario <?php echo $grupo; ?></p>
        <?php for ($row = 1; $row <= $rowsPorGroup; $row++): ?>
            <?php 
            $asignacionFound = false;
            $h=strval(($grupo - 1) * $rowsPorGroup + $row);
            foreach ($asignaciones as $asginacion) {
                if ($h == $asginacion->horario) {
                    $asignacionFound = true;
                    $alumno_id = $asginacion->alumno_id;
                
                    break;
                }
            }
            ?>
            <div class="horarios__fila">
                <div class="horario__alumno">
                    <p>
                        <?php if ($asignacionFound): ?>
                            <a href="/alumnos/alumno?alumno_id=<?php echo $alumno_id; ?>&horario=<?php echo $h; ?>&dia=<?php echo $dia; ?>">
                                <?php 
                                foreach ($alumnos as $alumno) {
                                    if (intval($alumno->id) === intval($alumno_id)) {
                                        echo $alumno->nombre;
                                        break;
                                    }
                                }
                                ?>
                            </a>
                        <?php else: ?>
                            <a href="/alumnos/crear?alumno_id=nuevo&horario=<?php echo $h; ?>&dia=<?php echo $dia; ?>">Libre</a>
                                
                        <?php endif; ?>
                    </p>
                    <button id=<?php echo $grupo . "." .$row; ?> class="presente boton-verde">Presente</button>
                    <a href="/alumnos/borrarAlumno?alumno_id=<?php echo $alumno_id; ?>&horario=<?php echo $h; ?>&dia=<?php echo $dia; ?>" class="horario__borrar">
                        <?php @includirTemplate("deleteButton"); ?>
                    </a>
                </div><!--horario alumno -->
                <br>
            </div><!--horario fila -->
        <?php endfor; ?>
    </div><!--horarios grupo -->
<?php endfor; ?>

         
    </div>
</div>
</main>