<main class="contenedor">
<div class="contenedor horarios">
    <div class="horarios__titulo">
        
        <button id="btn-dia-back" class="boton boton-verde"><</button>
        <h1 class="dia">Miercoles</h1>
        <button id="btn-dia-next" class="boton boton-verde">></button>
    </div>
     <button id="no-presentismo" class="boton-azul">Deshabilitar Presentismo</button>
    <div class="horarios__lista">
        <?php includirTemplate('horario');?>
    </div>
</div>
</main>