<?php
session_start(); 

if(!isset($_SESSION['id'])){ //oe teni la sesion iniciada o nao
    header("Location: index.php");
}
?>
<html>
<h2><center>NUMEROS DE RIFA</center></h2>
 <!-- aqui iria el coso pa peid numeros-->
<form action="" method="post">
<label></label> 

</form>
<!--deje las instrucciones aqui lol-->

<!--La pagina debe permitir reservar numeros para una rifa. Cada numero reservado tendra un valor de $2.000.
El formulario debera utilizar el metodo POST.
 El usuario debe poder agregar numeros de rifa.
 El usuario debe poder quitar numeros de rifa.
 La cantidad de numeros reservados debera mantenerse utilizando sesiones.
 Si el usuario actualiza la pagina utiliNtidad de numeros reservados, el precio de cada numero y el
total a pagar.
 No se deben permitir cantidades negativas.
Total = cantidad de numeros reservados x precio-->
</html>