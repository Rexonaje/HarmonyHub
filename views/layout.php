<?php 
if(!isset($_SESSION)){
    session_start();
}
    
    $auth=$_SESSION['login']??false;
   // var_dump($auth);
   if(!isset($inicio)){
    $inicio=false;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HarmonyHub</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header>
        <div>
            <?php if(!$auth):?> 
                <a href="/"><h1>HarmonyHub: </h1></a>
            <?php endif; ?>
            <?php if($auth):?> 
                <a href="/asignaciones"><h1>HarmonyHub: </h1></a>
            <?php endif; ?>
            <h2 class="subtitulo">Gestión Musical de Alumnos </h2>
        </div>
        <nav>
        <?php if($auth):?>
                <a href="/logout">Cerrar Sesion</a>
        <?php endif; ?>
        <?php 
               /* if(!$auth):?>
                    <a href="/login">Iniciar Sesion</a>
                <?php endif;*/ 
        ?>
        </nav>
        <p  class="dark-mode-btn">
            <?php @includirTemplate('darkModeButton');  ?>
        </p>
    </header>
    <?php echo $contenido; ?>  
    <script src="../build/js/bundle.min.js"></script> 
</body>
</html>
