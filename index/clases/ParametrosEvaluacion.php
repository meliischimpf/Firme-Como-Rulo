<?php
class ParametrosEvaluacion {
    public static function obtenerParametrosPorInstituto($id_instituto) {
        $db = new Database();
        $conn = $db->connect();

        $sql = "SELECT promocion, asistencias_promocion, regular, asistencias_regular, libre, asistencias_libre 
                FROM parametros WHERE id_instituto = :id_instituto";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_instituto', $id_instituto);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve los parámetros o null si no existen
    }

    public static function actualizarParametros($id_instituto, $promocion, $asistencias_promocion, $regular, $asistencias_regular, $libre, $asistencias_libre) {
        $db = new Database();
        $conn = $db->connect();

        $sql = "UPDATE parametros 
                SET promocion = :promocion, asistencias_promocion = :asistencias_promocion, 
                    regular = :regular, asistencias_regular = :asistencias_regular, 
                    libre = :libre, asistencias_libre = :asistencias_libre 
                WHERE id_instituto = :id_instituto";
        $stmt = $conn->prepare($sql);
        
        $stmt->bindParam(':id_instituto', $id_instituto);
        $stmt->bindParam(':promocion', $promocion);
        $stmt->bindParam(':asistencias_promocion', $asistencia_promocion);
        $stmt->bindParam(':regular', $regular);
        $stmt->bindParam(':asistencias_regular', $asistencia_regular);
        $stmt->bindParam(':libre', $libre);
        $stmt->bindParam(':asistencias_libre', $asistencia_libre);

        return $stmt->execute();
    }
}
