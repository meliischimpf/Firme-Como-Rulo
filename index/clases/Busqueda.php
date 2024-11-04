<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/conexion.php';

class Busqueda {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function obtenerInstitutos() {
        $stmt = $this->conn->prepare("SELECT id_instituto, nombre_instituto FROM instituto");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerMateriasPorInstituto($id_instituto) {
        $stmt = $this->conn->prepare("SELECT id_materia, nombre_materia FROM materias WHERE id_instituto = :id_instituto");
        $stmt->bindParam(':id_instituto', $id_instituto, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerAlumnosPorMateria($id_materia) {
        $stmt = $this->conn->prepare("SELECT id_alumno, apellido_alumno, nombre_alumno FROM alumno WHERE id_materia = :id_materia");
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
