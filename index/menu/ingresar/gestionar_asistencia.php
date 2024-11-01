<?php
header('Content-Type: application/json');
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/clases/Alumno.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_alumno = $_POST['id_alumno'];
    $id_materia = $_POST['id_materia'];
    $presente = $_POST['presente'] === 'true'; //ToDo  si se justifica averiguar.
    $fecha_asistencia = $_POST['fecha_asistencia'];

    try {
        Alumno::gestionarAsistencia($id_alumno, $id_materia, $presente);
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
