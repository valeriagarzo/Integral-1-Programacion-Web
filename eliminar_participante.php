<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    echo json_encode(["error" => "No autorizado"]);
    exit();
}

$id = $_GET['usuario'] ?? '';
$archivo = 'participantes.json';
$participantes = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];

$nuevosParticipantes = array_filter($participantes, function($p) use ($usuario) {
    return $p['usuario'] != $usuario;
});

if (count($nuevosParticipantes) < count($participantes)) {
    // Reindexar el array y guardar
    file_put_contents($archivo, json_encode(array_values($nuevosParticipantes), JSON_PRETTY_PRINT));
    echo json_encode(["status" => "success", "mensaje" => "Participante eliminado"]);
} else {
    http_response_code(404);
    echo json_encode(["error" => "Participante no encontrado"]);
}
echo "Sesión cerrada.";
echo "
    <a href='index.php'>
    Volver a login 
    </a>"
?>
