<?php
session_start();
header('Content-Type: application/json');

//es como pregunta si la variable de session se llama "usuario" pues si no tiene nombre o no existe
//asumira com que entro sin hacer login.
if (!isset($_SESSION['usuario'])) {
    http_response_code(401);//no autorizado
    echo json_encode(["error" => "Acceso no autorizado. Inicie sesión."]);
    exit();//es para que no continue leyendo las lineas e abajo... es un script
}

$archivo = 'participantes.json'; //donde se cguarda los datos
//comprueba si el archivo fisico existe
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo); //el echo y este lee lo que hay dentro del archivo
    echo $contenido;
} else {
    echo json_encode([]); //simplemente evita un colapso si el archivo aun no existe
}
?>