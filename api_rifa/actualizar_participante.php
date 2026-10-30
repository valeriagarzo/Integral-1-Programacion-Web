<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario'])) {
    http_response_code(401);
    echo json_encode(["error" => "No autorizado"]);
    exit();
}
//captura como pokemon el id del usuario
$id = $_POST['id'] ?? '';
//los otras ds lineas es para ver si el participantes.json existe, y pues si existe va a leer el contenido
//lo convierte en php con el json_encode y si no existe crea un arreglo vacio
$archivo = 'participantes.json';
$participantes = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];

$encontrado = false; //una variable que es falso y se hace verdadero cuando si encuentra participante.

//foreach ($participantes as &$p): Recorre la lista de participantes uno por uno. El símbolo ampersand (&) es clave aquí: 
// significa que pasamos la variable por referencia, permitiéndonos modificar directamente el elemento dentro del arreglo original
foreach ($participantes as &$p) {
    if ($p['id'] == $id) { //este if es para comprobar si el id que buscamos coincide con el del participante actual.
        $p['nombre'] = $_POST['nombre'] ?? $p['nombre'];
        $p['ciudad'] = $_POST['ciudad'] ?? $p['ciudad'];
        $p['apellido'] = $_POST['apellido'] ?? $p['apellido'];
        $p['categria'] = $_POST['categoria'] ?? $p['categoria'];
        $encontrado = true;
        break;
    }
}

if ($encontrado) {
    file_put_contents($archivo, json_encode($participantes, JSON_PRETTY_PRINT));
    echo json_encode(["status" => "success", "mensaje" => "Participante actualizado"]);
} else {
    http_response_code(404);
    echo json_encode(["error" => "Participante no encontrado"]);
}
echo "Sesión cerrada.";
echo "
    <a href='index.php'>
    Volver a login 
    </a>
";
?>
