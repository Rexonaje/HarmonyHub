<main>
            <?php 
            $id=$_GET['alumno_id'];
            $horario=$_GET['horario'];
            $dia=$_GET['dia'];
            ?>
        <div class="contenedor flex-row-rev">
            <form method="post">
                <label  for="cancion"><h2 class="canciones-label">Añadir cancion para: <?php echo $alumnoNombre[0]->nombre;?></h2>
                    
                </label>
                <div id="añadir-cancion">
                <a class="boton-verde" href="/alumnos/alumno?alumno_id=<?php echo $id; ?>&horario=<?php echo $horario; ?>&dia=<?php echo $dia; ?>">Volver</a>
                    <textarea required id="cancion" name="cancion[titulo]"> </textarea>
                    <button type="submit" class="boton-azul">+</button>
                    <textarea name="cancion[alumno_id]" hidden><?php echo $id?></textarea>
                </div>
                <?php if (!empty($mensaje)): ?>
                    <div class=" contenedor mensaje-error">
                        <p> <?php echo $mensaje; ?></p>
                    </div>
                <?php endif; ?>
            </form>
        </div>
</main>