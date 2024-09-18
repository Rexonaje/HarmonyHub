<main>
    
   
    <form   method="post">
        <div class="contenedor flex-row-rev nombre">
            <a href="/asignaciones" class="boton-verde">Volver</a>
            <input
              type="text"
              value= "<?php echo $alumno->nombre; ?>"
             id="nombre"
             name="alumno[nombre]"
             required
             >
            <button type="submit" class=" boton-azul">guardar</button>
        </div>
        <div class="comentarios canciones">
            <h1>Comentarios</h1>
            <textarea 
              id="comentarios" 
              name="alumno[comentarios]"><?php echo $alumno->comentarios; ?>
            </textarea>
        </div><!--comentarios -->
    </form>
    <div class= "canciones">
        <h1>Repertorio Actual</h1>
        <!--form   method="post">
            <div id="añadir-cancion">
                <textarea name="canciones" > </textarea>
                <button type="submit" class="boton-azul">+</button>
            </div>
        </form-->
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