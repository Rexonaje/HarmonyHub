<main>
    <!--var en la url que dice el id del alumno -->
     
    <p> <?php //debugear($alumno,false) ;?></p>
     <!--?php debugear($alumnos);? --> 
    <form   method="post">
        <div class="contenedor flex-row-rev nombre">
            <a href="/asignaciones" class="boton-verde">Volver</a>
            <input type="text" placeholder="Nombre y apellido" value=" <?php echo $alumno->nombre;  ?> ">
            <button type="submit" class=" boton-azul">guardar</button>
        </div>
        <div class="comentarios canciones">
            <h1>Comentarios</h1>
            <p contenteditable ><?php echo $alumno->comentarios; ?></p>
        </div><!--comentarios -->
    </form>
    <div class= "canciones">
        <h1>Repertorio Actual</h1>
        <form   method="post">
            <div id="añadir-cancion">
                <textarea > </textarea>
                <button type="submit" class="boton-azul">+</button>
            </div>
        </form>
        <?php if (!empty($canciones)): ?>
        <ul>
            <?php foreach ($canciones as $cancion): ?>
                <li><?php echo $cancion->titulo; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
            <p>No hay canciones disponibles para este alumno.</p>
        <?php endif; ?>

    </div><!--canciones-->
</main>