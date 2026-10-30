<?php
session_start(); 
header('Content-Type: application/json');

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

$archivoactual = $_FILES["userfile"]["name"];

echo "Archivo subido:".$archivoactual."";

$archive = 'archivos.json';
$archivoss = file_exists($archive) ? json_decode(file_get_contents($archive), true) : [];

$nuevoarchivo = [
    $archivoactual
];


$archivoss[] = $nuevoarchivo;
//convierte el arreglo actualizado a formato JSON, jkjkjkjkj JSON_PRETTY_PRINT soy tu fan
file_put_contents($archive, json_encode($archivoss, JSON_PRETTY_PRINT));

if (file_exists($archive)) {
    $contenido = file_get_contents($archive); //el echo y este lee lo que hay dentro del archivo
    echo $contenido;
} else {
    echo json_encode([]); //simplemente evita un colapso si el archivo aun no existe
}

echo "
    <a href='panel.php'>
    Volver al inicio 
    </a>"

?>
