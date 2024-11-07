<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/clases/Materia.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_materia'])) {
    $id_materia = $_POST['id_materia'];
    $nombre_materia = $_POST['nombre'];
    $id_instituto = $_POST['instituto'];

    $materia = Materia::crearMateriaDesdeID($id_materia);
    if ($materia) {

        $db = new Database();
        $conn = $db->connect();

        $sql = "UPDATE materias SET nombre_materia = :nombre, id_instituto = :id_instituto WHERE id_materia = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre_materia);
        $stmt->bindParam(':id_instituto', $id_instituto);
        $stmt->bindParam(':id', $id_materia);

        if ($stmt->execute()) {
            echo "Materia actualizada exitosamente.";
            header("location: ../../menu.php");
        } else {
            echo "Error al actualizar la materia.";
        }
    } else {
        echo "No se encontró la materia.";
    }
}
?>

