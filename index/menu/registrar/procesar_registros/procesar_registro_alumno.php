<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/clases/Alumno.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/clases/Busqueda.php';

$db = new Database();
$conn = $db->connect();

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $mail = $_POST['mail'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $materia = $_POST['materia'];

    $alumno = new Alumno($apellido, $nombre, $dni, $mail, $fecha_nacimiento, $materia, $presente, $parcial1, $parcial2, $final);

    if ($alumno->darAlta($conn)) {
        echo "Alumno registrado exitosamente.";
    } else {
        echo "Error al registrar el alumno.";
    }
}
?>
