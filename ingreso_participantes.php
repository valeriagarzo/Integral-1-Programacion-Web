<?php
session_start();
header('Content-Type: application/json');
// por si caso isset es una funcion que comprueba si una variable es null  no
if (!isset($_SESSION['usuario'])){
    http_response_code(401);
    echo json_encode(["error" => "No autorizado"]);
    exit();
}
//lo de aqui recibe los datos por metodo POST para el pstman o un formulari por lo que investigue
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$ciudad = $_POST['ciudad'] ?? '';
$categoria = $_POST['categoria'] ?? '';
// el empty revisa si alguno de estos bligatorios esta vacio y si lo esta pues da error 400
if (empty($nombre) || empty($apellido) || empty($categoria) || empty($ciudad)) {
    http_response_code(400);
    echo json_encode(["error" => "Faltan datos obligatorios"]);
    exit(); 
}

$archivo = 'participantes.json';
//esta linea es una forma de leer un rchivo json y se convierta en un array (evita que se rompa ñam ñam :p)
$participantes = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];

$nuevoParticipante = [
    "id" => uniqid(), //uniqid() genera automaticamente un ID (senti curisidad cuando me pregunte si habia algo que fuera mas un id rado y pues lo use xd)
    "nombre" => $nombre,
    "apellido" => $apellido,
    "categoria" => $categoria,
    "ciudad" => $ciudad
    
];


$participantes[] = $nuevoParticipante;
//convierte el arreglo actualizado a formato JSON, jkjkjkjkj JSON_PRETTY_PRINT soy tu fan
file_put_contents($archivo, json_encode($participantes, JSON_PRETTY_PRINT));

echo json_encode(["status" => "success", "mensaje" => "Participante registrado", "data" => $nuevoParticipante]); //actualizacion existosa
echo "Sesión cerrada.";
echo "
    <a href='index.php'>
    Volver a login 
    </a>
";
?>
