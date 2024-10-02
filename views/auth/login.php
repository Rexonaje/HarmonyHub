<main>

    <div class="contenedor flex-row-rev login">
        <h1>Bienvenido</h1>
        <form   method="post">
            <?php foreach($errores as $e):?>
                <div class="boton-rojo"><?php echo $e;?></div>
            <?php endforeach;?>
           <fieldset>
            <legend>Iniciar Sesion</legend>

            <label for="email">Email</label>
            <input id="email" placeholder="Insertar email" type="email" name="email">
         

            <label for="password">Password</label>
            <input id="password" placeholder="Insertar password" type="password" name="password">
           </fieldset> 
           <input type="submit" value="iniciar sesion" class="boton boton-verde">
        </form>
    </div>
</main> 