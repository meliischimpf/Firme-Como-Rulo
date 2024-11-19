<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme_Como_Rulo/index/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme_Como_Rulo/index/clases/Materia.php';

$db = new Database();
$conn = $db->connect();

if (isset($_POST['nombre'], $_POST['instituto'])) {
    $nombre = $_POST['nombre'];
    $id_instituto = $_POST['instituto'];

    $materia = new Materia($nombre);

    if ($materia->darAltaMateria($id_instituto)) {
        echo "Materia registrado exitosamente.";
        header("location: ../../menu.php");
        exit;
    } else {
        echo "Error al registrar el materia.";
    }
} else {
    echo "Por favor, complete todos los campos requeridos.";
}
?>
