<?php
//creo q se noa lo q pasa
session_start();
session_destroy();

echo "Sesión cerrada.";
echo "
    <a href='index.php'>
    Volver a login 
    </a>
"; //link q clickeas pa salir d aqui