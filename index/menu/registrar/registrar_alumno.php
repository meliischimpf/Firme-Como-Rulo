<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/clases/Alumno.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Firme como Rulo/index/clases/Busqueda.php';

$db = new Database();
$conn = $db->connect();
$busqueda = new Busqueda($conn);

// Obtener institutos para el formulario
$institutos = $busqueda->obtenerInstitutos();
$materias = [];

// Comprobar si se seleccionó un instituto
if (isset($_POST['instituto']) && !empty($_POST['instituto'])) {
    $id_instituto = $_POST['instituto'];
    $materias = $busqueda->obtenerMateriasPorInstituto($id_instituto);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Alumno</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../resources/menu/registrar/forms.css">
    <link rel="icon" href="../../resources/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <form action="procesar_registro_alumno.php" method="post">
        <h2>Registro de Alumno</h2>

        <div class="form-group">
            <div class="half-width">
                <label for="apellido"><b>Apellido</b></label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="half-width">
                <label for="nombre"><b>Nombre</b></label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
        </div>

        <div class="form-group">
            <div class="half-width">
                <label for="dni"><b>DNI</b></label>
                <input type="number" id="dni" name="dni" maxlength="8" required>
            </div>
            <div class="half-width">
                <label for="mail"><b>Correo Electrónico</b></label>
                <input type="email" id="mail" name="mail" required>
            </div>
        </div>

        <!-- Selección de instituto -->
        <div class="form-group">
            <label for="instituto"><b>Instituto</b></label>
            <select name="instituto" id="instituto" required onchange="this.form.submit()">
                <option value="">Seleccione un instituto</option>
                <?php
                    foreach ($institutos as $instituto) {
                        $selected = (isset($id_instituto) && $id_instituto == $instituto['id_instituto']) ? 'selected' : '';
                        echo "<option value='" . $instituto['id_instituto'] . "' $selected>" . $instituto['nombre_instituto'] . "</option>";
                    }
                ?>
            </select>
        </div>

        <!-- Selección de materia -->
        <div class="form-group">
            <label for="materia"><b>Materia</b></label>
            <select name="materia" id="materia" required>
                <option value="">Seleccione una materia</option>
                <?php
                    if (!empty($materias)) {
                        foreach ($materias as $materia) {
                            echo "<option value='" . $materia['id_materia'] . "'>" . $materia['nombre_materia'] . "</option>";
                        }
                    }
                ?>
            </select>
        </div>

        <button type="submit"><b>Registrar</b></button>
    </form>
</body>
</html>
