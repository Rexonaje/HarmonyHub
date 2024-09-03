<?php for ($i = 1; $i <= 5; $i++) :?>
        <div class="horarios__fila">
            <p class="horarios__numero"><?php echo $i;?></p>
        

            <div class="horario__alumno">
                <p>
                    <a href="/alumnos?alumnoId=1">Añadir Alumno</a>
                </p>
                <button id=<?php echo $i ."a";?> class="presente boton-verde">Presente</button>
                <button class="horario__borrar" >
                    <?php @includirTemplate("deleteButton"); ?>
                </button>
            </div><!--horario alumno -->

            <div class="horario__alumno">
                <p>
                    <a href="/alumnos">Añadir Alumno</a>
                </p>
                <button id=<?php echo $i ."b";?> class="presente boton-verde">Presente</button>
                <button class="horario__borrar">
                    <?php @includirTemplate("deleteButton"); ?>
                    <!-- que confirme antes de borrar-->
                </button>
            </div><!--horario alumno -->
            <br>
        </div><!--horario fila -->
        <?php endfor;?>