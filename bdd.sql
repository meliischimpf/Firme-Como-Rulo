-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para firme_como_rulo
CREATE DATABASE IF NOT EXISTS `firme_como_rulo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `firme_como_rulo`;

-- Volcando estructura para tabla firme_como_rulo.alumno
CREATE TABLE IF NOT EXISTS `alumno` (
  `id_alumno` int NOT NULL AUTO_INCREMENT,
  `nombre_alumno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido_alumno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail_alumno` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fecha_nacimiento_alumno` date NOT NULL,
  `dni_alumno` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_materia` int DEFAULT NULL,
  PRIMARY KEY (`id_alumno`),
  UNIQUE KEY `DNI` (`dni_alumno`) USING BTREE,
  UNIQUE KEY `mail` (`mail_alumno`) USING BTREE,
  KEY `alumno_ibfk_1` (`id_materia`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla firme_como_rulo.alumno: ~22 rows (aproximadamente)
INSERT INTO `alumno` (`id_alumno`, `nombre_alumno`, `apellido_alumno`, `mail_alumno`, `fecha_nacimiento_alumno`, `dni_alumno`, `id_materia`) VALUES
	(1, 'Valentino', 'Andrade', 'valentino.andrade@ejemplo.com', '1999-03-12', '35123456', 1),
	(2, 'Lucas', 'Cedres', 'lucas.cedres@ejemplo.com', '1998-09-07', '34876543', 1),
	(3, 'Facundo', 'Figun', 'facundo.figun@ejemplo.com', '2000-11-25', '40123789', 1),
	(4, 'Luca', 'Giordano', 'luca.giordano@ejemplo.com', '1997-06-02', '32456789', 1),
	(5, 'Bruno', 'Godoy', 'bruno.godoy@ejemplo.com', '1999-01-18', '36789123', 1),
	(6, 'Agustin', 'Gomez', 'agustin.gomez@ejemplo.com', '1996-04-30', '33567890', 1),
	(7, 'Brian', 'Gonzalez', 'brian.gonzalez@ejemplo.com', '1997-12-05', '35678901', 1),
	(8, 'Federico', 'Guigou Scottini', 'federico.guigou@ejemplo.com', '1998-08-15', '37890123', 1),
	(9, 'Luna', 'Marrano', 'luna.marrano@ejemplo.com', '1999-03-10', '38901234', 1),
	(10, 'Giuliana', 'Mercado Aviles', 'giuliana.mercado@ejemplo.com', '1995-10-22', '33345678', 1),
	(11, 'Lucila', 'Mercado Ruiz', 'lucila.mercado@ejemplo.com', '1996-12-08', '32567890', 1),
	(12, 'Angel', 'Murillo', 'angel.murillo@ejemplo.com', '1998-02-27', '34890123', 1),
	(13, 'Juan', 'Nissero', 'juan.nissero@ejemplo.com', '1999-07-17', '36123456', 1),
	(14, 'Fausto', 'Parada', 'fausto.parada@ejemplo.com', '1997-11-06', '35234567', 1),
	(15, 'Ignacio', 'Piter', 'ignacio.piter@ejemplo.com', '1996-05-19', '32789012', 1),
	(16, 'Tomas', 'Planchon', 'tomas.planchon@ejemplo.com', '2000-09-03', '40456789', 1),
	(17, 'Elisa', 'Ronconi', 'elisa.ronconi@ejemplo.com', '1995-01-24', '31678123', 1),
	(18, 'Exequiel', 'Sanchez', 'exequiel.sanchez@ejemplo.com', '1998-04-11', '33234567', 1),
	(19, 'Melina', 'Schimpf Baldo', 'melina.schimpf@ejemplo.com', '2003-06-02', '33789456', 1),
	(20, 'Diego', 'Segovia', 'diego.segovia@ejemplo.com', '1997-02-13', '34567890', 1),
	(21, 'Camila', 'Sittner', 'camila.sittner@ejemplo.com', '1999-08-20', '36456789', 1),
	(22, 'Yamil', 'Villa', 'yamil.villa@ejemplo.com', '1998-06-28', '35345678', 1);

-- Volcando estructura para tabla firme_como_rulo.asistencias
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id_asistencia` int NOT NULL AUTO_INCREMENT,
  `id_alumno` int NOT NULL,
  `id_materia` int NOT NULL,
  `fecha_asistencia` date DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla firme_como_rulo.asistencias: ~20 rows (aproximadamente)
INSERT INTO `asistencias` (`id_asistencia`, `id_alumno`, `id_materia`, `fecha_asistencia`) VALUES
	(1, 1, 1, '2024-11-01'),
	(2, 2, 1, '2024-11-01'),
	(3, 3, 1, '2024-11-01'),
	(4, 4, 1, '2024-11-01'),
	(5, 7, 1, '2024-11-01'),
	(6, 6, 1, '2024-11-01'),
	(7, 5, 1, '2024-11-01'),
	(8, 8, 1, '2024-11-01'),
	(9, 10, 1, '2024-11-01'),
	(10, 11, 1, '2024-11-01'),
	(11, 12, 1, '2024-11-01'),
	(12, 14, 1, '2024-11-01'),
	(13, 15, 1, '2024-11-01'),
	(14, 16, 1, '2024-11-01'),
	(15, 17, 1, '2024-11-01'),
	(16, 18, 1, '2024-11-01'),
	(17, 20, 1, '2024-11-01'),
	(18, 19, 1, '2024-11-01'),
	(19, 21, 1, '2024-11-01'),
	(20, 22, 1, '2024-11-01');

-- Volcando estructura para tabla firme_como_rulo.calificaciones
CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id_alumno` int NOT NULL,
  `id_materia` int NOT NULL,
  `parcial1` decimal(5,2) unsigned DEFAULT NULL,
  `parcial2` decimal(5,2) unsigned DEFAULT NULL,
  `final` decimal(5,2) unsigned DEFAULT NULL,
  UNIQUE KEY `id_alumno_2` (`id_alumno`,`id_materia`),
  UNIQUE KEY `id_alumno_3` (`id_alumno`,`id_materia`),
  KEY `id_materia` (`id_materia`),
  KEY `id_alumno` (`id_alumno`),
  CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla firme_como_rulo.calificaciones: ~0 rows (aproximadamente)

-- Volcando estructura para tabla firme_como_rulo.instituto
CREATE TABLE IF NOT EXISTS `instituto` (
  `id_instituto` int NOT NULL AUTO_INCREMENT,
  `nombre_instituto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `direccion_instituto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cue_instituto` int DEFAULT NULL,
  PRIMARY KEY (`id_instituto`),
  UNIQUE KEY `CUE` (`cue_instituto`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla firme_como_rulo.instituto: ~1 rows (aproximadamente)
INSERT INTO `instituto` (`id_instituto`, `nombre_instituto`, `direccion_instituto`, `cue_instituto`) VALUES
	(1, 'Sedes Sapientiae', 'Santa Fe 74', 256);

-- Volcando estructura para tabla firme_como_rulo.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_instituto` int DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_instituto` (`id_instituto`),
  CONSTRAINT `FK_id_instituto` FOREIGN KEY (`id_instituto`) REFERENCES `instituto` (`id_instituto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla firme_como_rulo.materias: ~1 rows (aproximadamente)
INSERT INTO `materias` (`id_materia`, `nombre_materia`, `id_instituto`) VALUES
	(1, 'Programacion II', 1);

-- Volcando estructura para tabla firme_como_rulo.parametros
CREATE TABLE IF NOT EXISTS `parametros` (
  `libre` int DEFAULT NULL,
  `regular` int DEFAULT NULL,
  `promocion` int DEFAULT NULL,
  `asistencias_promocion` int DEFAULT NULL,
  `asistencias_regular` int DEFAULT NULL,
  `asistencias_libre` int DEFAULT NULL,
  `id_instituto` int DEFAULT NULL,
  KEY `id_instituto` (`id_instituto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla firme_como_rulo.parametros: ~1 rows (aproximadamente)
INSERT INTO `parametros` (`libre`, `regular`, `promocion`, `asistencias_promocion`, `asistencias_regular`, `asistencias_libre`, `id_instituto`) VALUES
	(5, 6, 7, 70, 60, 50, 1);

-- Volcando estructura para tabla firme_como_rulo.profesores
CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profesor` int NOT NULL AUTO_INCREMENT,
  `nombre_profesor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido_profesor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dni_profesor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `legajo_profesor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_instituto` int DEFAULT NULL,
  `id_materia` int DEFAULT NULL,
  PRIMARY KEY (`id_profesor`),
  UNIQUE KEY `DNI` (`dni_profesor`) USING BTREE,
  UNIQUE KEY `legajo` (`legajo_profesor`) USING BTREE,
  KEY `profesores_ibfk_1` (`id_instituto`),
  KEY `profesores_ibfk_2` (`id_materia`),
  CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`id_instituto`) REFERENCES `instituto` (`id_instituto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `profesores_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla firme_como_rulo.profesores: ~1 rows (aproximadamente)
INSERT INTO `profesores` (`id_profesor`, `nombre_profesor`, `apellido_profesor`, `dni_profesor`, `legajo_profesor`, `id_instituto`, `id_materia`) VALUES
	(1, 'Melina', 'Schimpf', '45338356', '001', 1, 1);

-- Volcando estructura para tabla firme_como_rulo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla firme_como_rulo.usuarios: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
