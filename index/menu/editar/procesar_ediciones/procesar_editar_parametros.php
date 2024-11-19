<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme_Como_Rulo/index/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme_Como_Rulo/index/clases/ParametrosEvaluacion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_instituto'], $_POST['promocion'], $_POST['asistencia_promocion'], $_POST['regular'], $_POST['asistencia_regular'], $_POST['libre'], $_POST['asistencia_libre'])) {
    $id_instituto = $_POST['id_instituto'];
    $promocion = $_POST['promocion'];
    $asistencia_promocion = $_POST['asistencia_promocion'];
    $regular = $_POST['regular'];
    $asistencia_regular = $_POST['asistencia_regular'];
    $libre = $_POST['libre'];
    $asistencia_libre = $_POST['asistencia_libre'];

    $resultado = ParametrosEvaluacion::actualizarParametros($id_instituto, $promocion, $asistencia_promocion, $regular, $asistencia_regular, $libre, $asistencia_libre);

    if ($resultado) {
        echo "Parámetros actualizados correctamente.";
        header("location: ../../menu.php");
    } else {
        echo "Error al actualizar los parámetros.";
    }
} else {
    echo "Por favor, complete todos los campos.";
}
?>
