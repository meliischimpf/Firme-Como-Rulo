<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Institución</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../resources/menu/registrar/forms.css">
    <link rel="icon" href="../../resources/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <form action="main.php" method="post">
        <h2>Registro de Institución</h2>

        <div class="form-group">
            <div class="half-width">
                <label for="nombre"><b>Nombre</b></label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="half-width">
                <label for="cue"><b>C.U.E.</b></label>
                <input type="number" id="cue" name="cue" required>
            </div>
        </div>

        <div class="form-group">
            <div class="half-width">
                <label for="direccion"><b>Dirección</b></label>
                <input type="text" id="direccion" name="direccion" required>
            </div>
        </div>

        <button type="submit"><b>Registrar</b></button>
    </form>
</body>
</html>