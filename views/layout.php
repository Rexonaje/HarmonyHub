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
        <a href="/"><h1>HarmonyHub: </h1></a>
            <h2 class="subtitulo">Gestión Musical de Alumnos </h2>
        </div>
        <p  class="dark-mode-btn">
            <?php @includirTemplate('darkModeButton');  ?>
</p>
    </header>
    <?php echo $contenido; ?>  
    <script src="../build/js/bundle.min.js"></script> 
</body>
</html>
