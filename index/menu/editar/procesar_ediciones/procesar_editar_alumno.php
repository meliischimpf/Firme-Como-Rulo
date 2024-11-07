<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/clases/Alumno.php';

$db = new Database();
$conn = $db->connect();

if (
    isset($_POST['id_alumno'], $_POST['apellido'], $_POST['nombre'], $_POST['dni'], 
          $_POST['mail'], $_POST['fecha_nacimiento'], $_POST['materia']) &&
    !empty($_POST['id_alumno']) && !empty($_POST['apellido']) && 
    !empty($_POST['nombre']) && !empty($_POST['dni']) && 
    !empty($_POST['mail']) && !empty($_POST['fecha_nacimiento']) && 
    !empty($_POST['materia'])
) {

    $id_alumno = $_POST['id_alumno'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $mail = $_POST['mail'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $id_materia = $_POST['materia']; 


    $resultado = Alumno::editarAlumno($id_alumno, $apellido, $nombre, $dni, $mail, $fecha_nacimiento, $id_materia);

    if ($resultado) {
        echo "Los datos del alumno se actualizaron correctamente.";
        header("location: ../../menu.php");
    } else {
        echo "Error al actualizar los datos del alumno.";
    }
} else {
    echo "Por favor, complete todos los campos requeridos.";
}
?>
