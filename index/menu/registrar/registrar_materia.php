<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Materia</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../resources/menu/registrar/forms.css">
    <link rel="icon" href="../../resources/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <form action="main.php" method="post">
        <h2>Registro de Materia</h2>

        <div class="form-group">
            <div class="half-width">
                <label for="nombre"><b>Nombre</b></label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="half-width">
                <label for="instituto"><b>Instituto</b></label>
                <select name="materia" id=""></select>
            </div>
        </div>

        <button type="submit"><b>Registrar</b></button>
    </form>
</body>
</html>