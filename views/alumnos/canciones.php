<main>
<?php 
            $id=$_GET['alumno_id'];
            $horario=$_GET['horario'];
            $dia=$_GET['dia'];
            ?>
<a class="boton-verde" href="/alumnos/alumno?alumno_id=<?php echo $id; ?>&horario=<?php echo $horario; ?>&dia=<?php echo $dia; ?>">Volver</a>
        <form method="post">
            <label for="cancion"><p>Añadir cancion</p>  </label>
            <div id="añadir-cancion">
                <textarea id="cancion" name="cancion[titulo]"> </textarea>
                <button type="submit" class="boton-azul">+</button>
                <textarea name="cancion[alumno_id]" hidden><?php echo $id?></textarea>
            </div>
        </form>
</main>