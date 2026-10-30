<?php

session_start();
session_destroy(); // destruye la informacion actual del usuario
header('Content-Type: application/json'); //lo mismo que en el login.ph ... solo indica que la respuesta se va recibir en formato json
echo json_encode(["status" => "success", "mensaje" => "Sesión cerrada correctamente"]); // avisa que la session fue cerrada con exito
?>