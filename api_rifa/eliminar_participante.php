<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario'])) {
    http_response_code(401);
    echo json_encode(["error" => "No autorizado"]);
    exit();
}

$id = $_GET['id'] ?? '';
$archivo = 'participantes.json';
$participantes = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];

$nuevosParticipantes = array_filter($participantes, function($p) use ($id) {
    return $p['id'] != $id;
});

if (count($nuevosParticipantes) < count($participantes)) {
    // Reindexar el array y guardar
    file_put_contents($archivo, json_encode(array_values($nuevosParticipantes), JSON_PRETTY_PRINT));
    echo json_encode(["status" => "success", "mensaje" => "Participante eliminado"]);
} else {
    http_response_code(404);
    echo json_encode(["error" => "Participante no encontrado"]);
}
?>