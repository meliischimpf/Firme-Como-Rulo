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
    <form action="main.php" method="post">
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

        <div class="form-group">
            <div class="half-width">
                <label for="fecha_nacimiento"><b>Fecha de Nacimiento</b></label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="half-width">
                <label for="materia"><b>Materia</b></label>
                <select name="materia" id=""></select>
            </div>
        </div>
        <button type="submit"><b>Registrar</b></button>
    </form>
</body>
</html>