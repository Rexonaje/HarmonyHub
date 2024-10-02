<?php
     
    $email='nico@nico.com';
    $password='cuandopaseeltemblor';

    $hassear=password_hash($password,PASSWORD_DEFAULT);
    $query="INSERT INTO usuarios(email,password) VALUES ('$email','$hassear')"; 
       
?>
<main>

    <h2>Creador de usuario</h2>
    <p><?php echo $hassear; ?></p>
    <p><?php echo $query; ?></p>
 
</main>