<?php
//sesion falsa pa poder guardar el captcha
session_start();
?>
<html>
    <head>
        <title>Registrar Participantes</title>
    </head>
    <body>
        <form action="ingreso_participantes.php" method="post">
            <!--insertar datos-->
            Nombre:
            <input type="text" name="nombre" id="nombre">
            Apellido
            <input type="text" name="apellido" id="apellido">
            Ciudad:
            <input type="text" name="ciudad" id="ciudad">
            Categoria
            <input type="text" name="categoria" id="categoria">
            <input type="submit" value="enviar">
        </form>
        <?php

        //isset = is set? osea, si lo q el get obtiene esta incorrecto
        if (isset($_GET["error"])){
        ?> 
        <br> Error :/ <br>
        <?php } 
            
            
            echo "
            <a href='panel.php'>
            Volver al inicio 
            </a>"
            ?>


    </body>



</html>
