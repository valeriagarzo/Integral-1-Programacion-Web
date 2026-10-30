<?php

session_start(); 

//recibe los datos
$user = $_POST["usuario"];
$password = $_POST["password"];
$sumacaptchatotal = $_POST["captcha"];
//recoge el resultado correcto de la otra pag
$captcha_correcto = $_SESSION["captcha_resultado"];

//verifica e inicia session
if ($user == "userupla" && $password == "upla123" && $sumacaptchatotal == $captcha_correcto) {
    $_SESSION["usuario"] = $user;
    $_SESSION["id"] = rand(1,5000);
    header("location: panel.php");

}else{
    header("Location: index.php?error=0");
}
