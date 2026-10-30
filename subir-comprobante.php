<?php
session_start(); 

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>

<html>
<!--esto lo copie y pegue de la pag d php lol-->
<!--es la wea q recibe archivos-->

<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="__URL__" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>

</html>