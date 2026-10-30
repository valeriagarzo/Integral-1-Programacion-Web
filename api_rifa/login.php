<?php

session_start();
//este coso indica como al postman o navegador que su respuesta que va a delvolver el archivo php estara 
// en format json
header('content-TYPE: application/json');
// esto es como definir y hacer una lista"
$usuario = $_POST['usuario'] ?? ''; //lo de " ?? '' " significa null
$password = $_POST['contrasenia'] ?? '';

//la tipica validacion de cntraseña y usuario xd creo que no hy mucho que explicar.
if ($usuario === 'userupla' && $password === 'upla123'){
    
    $_SESSION['usuario'] = $usuario;
    //el echo json_encode deuelve una respuesta JSON como " YEII SE LOGO " para indicar que el proceso esta bien
    echo json_encode(["status" => "success", "mensaje" => "Sesión iniciada correctamente"]);
    
}else{
    //ñam ñam es el error para indicar que el usuario no esta autorizado
    http_response_code(401);
    //es el mensaje que devulve si da error
    echo json_encode(["status" => "error", "mensaje" => "Credenciales incorrectas"]);

}
?>