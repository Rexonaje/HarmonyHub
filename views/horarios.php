<main class="contenedor">
<div class="contenedor horarios">
    <div class="horarios__titulo">
        <button id="btn-dia-back" class="boton boton-verde"><</button>
        <h1 class="dia"></h1>
        <button id="btn-dia-next" class="boton boton-verde">></button>
    </div>
    <div class="horarios__lista">
<?php for ($i = 1; $i <= 5; $i++) :?>
        <div class="horarios__fila">
        
            <p class="horarios__numero"><?php echo $i;?></p>

            <div class="horario__alumno">
                <p>
                    <a href="/alumnos">Añadir Alumno</a>
                </p>
                <button class=" presente boton-rojo">Presente</button>
                <button class="horario__borrar" >
                    <?php @includirTemplate("deleteButton"); ?>
                </button>
            </div><!--horario alumno -->

            <div class="horario__alumno">
                <p>
                    <a href="/alumnos">Añadir Alumno</a>
                </p>
                <button class="presente boton-verde">Presente</button>
                <button class="horario__borrar">
                    <?php @includirTemplate("deleteButton"); ?>
                    <!-- que confirme antes de borrar-->
                </button>
            </div><!--horario alumno -->
            <br>
        </div><!--horario fila -->
        <?php endfor;?>
    </div>
</div>
</main>