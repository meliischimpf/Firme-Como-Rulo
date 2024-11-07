<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/conexion.php';

class Alumno {
    
    public function __construct(
        public $nombre, 
        public $apellido, 
        public $mail, 
        public $fecha_nacimiento, 
        public $dni, 
        public $materia,
        public $presente,
        public $parcial1,
        public $parcial2,
        public $final
    ) {}            

    public function nombreAlumno() {
        return $this->nombre;
    }

    // busca asistencia por fecha para marcar el check anterior
    public static function obtenerAsistenciaPorFecha($id_materia, $fecha_asistencia) {
        $db = new Database();
        $conn = $db->connect();
    
        $query = "SELECT id_alumno FROM asistencias WHERE id_materia = :id_materia AND fecha_asistencia = :fecha_asistencia";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_asistencia', $fecha_asistencia, PDO::PARAM_STR);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    

    // registra o elimina asistencia
    public static function gestionarAsistencia($id_alumno, $id_materia, $presente, $fecha_asistencia = null) {
        $db = new Database();
        $conn = $db->connect();
    
        // fecha actual si no se selecciona una
        $fecha_asistencia = $fecha_asistencia ?? date('Y-m-d');
    
        if ($presente) {
            // registra asistencia
            $query = "INSERT INTO asistencias (id_alumno, id_materia, fecha_asistencia) 
                      VALUES (:id_alumno, :id_materia, :fecha_asistencia)
                      ON DUPLICATE KEY UPDATE fecha_asistencia = :fecha_asistencia";
        } else {
            // elimina asistencia
            $query = "DELETE FROM asistencias 
                      WHERE id_alumno = :id_alumno AND id_materia = :id_materia AND fecha_asistencia = :fecha_asistencia";
        }
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_asistencia', $fecha_asistencia, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    

    public static function gestionarNotas($id_alumno, $id_materia, $parcial1, $parcial2, $final) {
    
        $db = new Database();
        $conn = $db->connect();
    
        $querySelect = "SELECT parcial1, parcial2, final FROM calificaciones WHERE id_alumno = :id_alumno AND id_materia = :id_materia";
        $stmtSelect = $conn->prepare($querySelect);
        $stmtSelect->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmtSelect->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmtSelect->execute();
        $existingRow = $stmtSelect->fetch(PDO::FETCH_ASSOC);
        
        if ($existingRow) {
            $parcial1 = !empty($parcial1) ? $parcial1 : $existingRow['parcial1'];
            $parcial2 = !empty($parcial2) ? $parcial2 : $existingRow['parcial2'];
            $final = !empty($final) ? $final : $existingRow['final'];
        } else {
            $parcial1 = !empty($parcial1) ? $parcial1 : 0;
            $parcial2 = !empty($parcial2) ? $parcial2 : 0;
            $final = !empty($final) ? $final : 0;
        }
    
        $query = "INSERT INTO calificaciones (id_alumno, id_materia, parcial1, parcial2, final) 
                  VALUES (:id_alumno, :id_materia, :parcial1, :parcial2, :final) 
                  ON DUPLICATE KEY UPDATE 
                  parcial1 = :new_parcial1, 
                  parcial2 = :new_parcial2, 
                  final = :new_final";
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
        $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
        $stmt->bindParam(':parcial1', $parcial1, PDO::PARAM_STR);
        $stmt->bindParam(':parcial2', $parcial2, PDO::PARAM_STR);
        $stmt->bindParam(':final', $final, PDO::PARAM_STR);
        
        $stmt->bindParam(':new_parcial1', $parcial1, PDO::PARAM_STR);
        $stmt->bindParam(':new_parcial2', $parcial2, PDO::PARAM_STR);
        $stmt->bindParam(':new_final', $final, PDO::PARAM_STR);
        
        $stmt->execute();
    }
 
    public function darAlta($conn) {
        $sql = "INSERT INTO alumnos (apellido, nombre, dni, mail, fecha_nacimiento, id_materia)
                VALUES (:apellido, :nombre, :dni, :mail, :fecha_nacimiento, :materia)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':dni', $this->dni);
        $stmt->bindParam(':mail', $this->mail);
        $stmt->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
        $stmt->bindParam(':materia', $this->materia);

        return $stmt->execute();
    }
    
    public static function darBaja($id_alumno) {
        
        $db = new Database();
        $conn = $db->connect();
    
        if (!$conn) {
            error_log("Error al conectar a la base de datos.");
            return false;
        }
    
        try {
            // verifica si el alumno existe
            $checkQuery = "SELECT COUNT(*) FROM alumno WHERE id_alumno = :id_alumno";
            $checkStmt = $conn->prepare($checkQuery);
            $checkStmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
            $checkStmt->execute();
            $exists = $checkStmt->fetchColumn();
    
            if ($exists == 0) {
                error_log("El alumno con ID $id_alumno no existe.");
                return false;
            }
    
            // elimina el registro
            $query = "DELETE FROM alumno WHERE id_alumno = :id_alumno";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                error_log("El alumno con ID $id_alumno fue eliminado correctamente.");
                return true;
            } else {
                error_log("Error al ejecutar la consulta de eliminación.");
                return false;
            }

        } catch (PDOException $e) {
            error_log("Error al dar de baja al alumno: " . $e->getMessage());
            return false;
        }
    }
}

?>
