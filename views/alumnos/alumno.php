<main>
    
    <form   method="post">
        <?php if (!empty($mensaje)): ?>
                    <div class=" contenedor mensaje-error">
                        <p> <?php echo $mensaje; ?></p>
                    </div>
                <?php endif; ?>
        <div class="contenedor flex-row-rev nombre">
        
            </form>
            <a href="/asignaciones?dia=<?php echo $dia; ?>"  class="boton-verde">Volver</a>
            <input
              type="text"
              placeholder="Nombre y apellido"
              value=" <?php echo $alumno->nombre; ?> "
              id="nombre"
              name="alumno[nombre]"
             >
            <button type="submit" class=" boton-azul">guardar</button>
        </div> 
        <div class="comentarios canciones">
            <h1>Comentarios</h1>
            <textarea 
              type="text"
             
             id="comentarios" 
             name="alumno[comentarios]" 
            ><?php echo $alumno->comentarios;?></textarea>
        </div><!--comentarios -->
    </form>
    <div class= "canciones">
        <h1>Repertorio Actual
            <?php 
            $id=$_GET['alumno_id'];
            $horario=$_GET['horario'];
            $dia=$_GET['dia'];
            ?>
        <a href=" /alumnos/canciones??alumno_id=<?php echo $id?>&horario=<?php echo $horario; ?>&dia=<?php echo $dia; ?>" class="boton-azul">+</a>
        </h1>
        <!--form    method="post">
            <div id="añadir-cancion">
                <textarea > </textarea>
                <button type="submit" class="boton-azul">+</button>
            </div>
        </form-->
        <?php if (!empty($canciones)):
             ?>
        <ul>
            <?php foreach ($canciones as $cancion): ?>
                <li><?php echo $cancion->titulo; ?></li>
            <?php endforeach;?>
        </ul>
        <?php else: ?>
            <p>No hay canciones disponibles para este alumno.</p>
        <?php endif; ?>

    </div><!--canciones-->
</main>