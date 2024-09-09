<main class="contenedor">
<div class="contenedor horarios">
    <form  method="post">
        <h2>Dia: <?php echo $dia;?></h2>
        <div class="horarios__titulo">
            <select id="opciones" name="opciones">
            <option value=<?php echo $dia;?> selected hidden >Selecione</option>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes </option>
                <option value="Miercoles">Miercoles </option>
                <option value="Jueves">Jueves </option>
                <option value="Viernes">Viernes </option>
                <option value="Sabado">Sabado </option>
            </select>
            <button type="submit" id="btn-dia" class="boton boton-azul">Seleccionar dia</button>
        </div>
    </form>
     <button id="no-presentismo" class="boton-azul">Deshabilitar Presentismo</button>
    <div class="horarios__lista">
    <?php 
    // Define the number of groups and rows per group
    $grupos = 5;
    $rowsPerGroup = 2;
    ?>

<?php for ($grupo = 1; $grupo <= $grupos; $grupo++): ?>
    <div class="horarios__grupo">
        <p class="horarios__numero">Horario <?php echo $grupo; ?></p>
        <?php for ($row = 1; $row <= $rowsPerGroup; $row++): ?>
            <?php 
            $asignacionFound = false;
            foreach ($asignaciones as $asginacion) {
                $h=strval(($grupo - 1) * $rowsPerGroup + $row);
                
                if ($h == $asginacion->horario) {
                    $asignacionFound = true;
                    $alumnoId = $asginacion->alumno_id;
                
                    break;
                }
            }
            ?>
            <div class="horarios__fila">
                <div class="horario__alumno">
                    <p>
                        <?php if ($asignacionFound): ?>
                            <a href="/alumnos?alumnoId=<?php echo $alumnoId; ?>&horario=<?php echo $h; ?>&dia=<?php echo $dia; ?>">
                                <?php 
                                foreach ($alumnos as $alumno) {
                                    if ($alumno->alumnos_id === $alumnoId) {
                                        echo $alumno->nombre;
                                        break;
                                    }
                                }
                                ?>
                            </a>
                        <?php else: ?>
                            <a href="/alumnos?alumnoId=nuevo&horario=<?php echo $h; ?>&dia=<?php echo $dia; ?>">Libre</a>
                                
                        <?php endif; ?>
                    </p>
                    <button id=<?php echo $grupo . "." .$row; ?> class="presente boton-verde">Presente</button>
                    <button class="horario__borrar">
                        <?php @includirTemplate("deleteButton"); ?>
                    </button>
                </div><!--horario alumno -->
                <br>
            </div><!--horario fila -->
        <?php endfor; ?>
    </div><!--horarios grupo -->
<?php endfor; ?>

         
    </div>
</div>
</main>