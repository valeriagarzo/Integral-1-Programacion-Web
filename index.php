<?php
//sesion falsa pa poder guardar el captcha
session_start();
?>
<html>
    <head>
        <title>Inicio de Sesion</title>
    </head>
    <body>
        <form action="login.php" method="post">
            <!--insertar datos-->
            Usuario:
            <input type="text" name="usuario" id="usuario">
            Password:
            <input type="password" name="password" id="password">
            Captcha:
            <?php
            //tira numeros al azar
                $sumacaptcha1 = rand(1,20);
                $sumacaptcha2 = rand(1,20);
            //guarda la suma para q funcione en la otra pagina
                $_SESSION["captcha_resultado"] = $sumacaptcha1 + $sumacaptcha2;
            
            //suma visual en la pagina 
                echo "".$sumacaptcha1." + ".$sumacaptcha2." = ";
            ?>
            <input type="number" name="captcha" id="captcha" required>
            <input type="submit" value="enviar">
        </form>
        <?php

        //isset = is set? osea, si lo q el get obtiene esta incorrecto
        if (isset($_GET["error"])){
        ?> 
        <br> ERROR EN USUARIO, CONTRASENA O CAPTCHA <br>
        <?php } ?>


    </body>



</html>