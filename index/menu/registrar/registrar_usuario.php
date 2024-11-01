<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Banco</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../resources/menu/registrar/forms.css">
    <link rel="icon" href="../../resources/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <form action="index.php" method="post">
        <h2>Registro Usuario</h2>

        <div class="form-group">
            <div class="half-width">
                <label for="mail"><b>Mail</b></label>
                <input type="text" id="mail" name="mail" required>
            </div>
            <div class="half-width">
                <label for="password"><b>Contraseña</b></label>
                <input type="text" id="password" name="password" required>
            </div>
        </div>

        <div class="form-group">
            <div class="half-width">
                <label for="nombre"><b>Nombre</b></label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="half-width">
                <label for="apellido"><b>Apellido</b></label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
        </div>

        <div class="checkbox-group">
            <b><h4>Tipo de Usuario:</h4></b>
            
                <input type="radio" id="profesorRadio" name="userType" value="profesor">
                <span>Profesor</span>
                <input type="radio" id="alumnoRadio" name="userType" value="alumno">
                <span>Alumno</span>
        </div>

        <button type="submit"><b>Registrar</b></button>
</body>
</html>