<?php
session_start();
header('Content-Type: application/json');

//es como pregunta si la variable de session se llama "usuario" pues si no tiene nombre o no existe
//asumira que el usuario quiere ver los premios sin iniciar sesion antes
if (!isset($_SESSION['usuario'])) {
    http_response_code(401);// error: no autorizacion
    echo json_encode(["error" => "Acceso no autorizado."]);
    exit();
}

$archivo = 'premios.json';
//l mismo que antes solo ve si el archivo fisisco existe
if (file_exists($archivo)) {
    echo file_get_contents($archivo);
} else {
    echo json_encode([]);
}
?>