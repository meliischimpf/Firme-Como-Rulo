<?php
require 'conexion.php';

// limpia datos de entrada
function clean_input($data) {
    $data = trim($data); //elimina espacios en blanco
    $data = stripslashes($data); //borra barras
    $data = htmlspecialchars($data); 
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = clean_input($_POST["mail"]);
    $password = clean_input($_POST["password"]);

    $database = new Database();
    $conn = $database->connect();

    try {

        $stmt = $conn->prepare('SELECT * FROM usuarios WHERE mail_usuario = :mail');
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();
  
        $mail_db = $stmt->fetch(PDO::FETCH_ASSOC); 
        if ($mail_db['password_usuario'] == $password) {
            header("Location: menu/menu.php");
            exit();
        } else {
            echo "Error: Usuario o contraseña inválidos.";
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }

} else {
    echo "Error: No se recibieron los valores por POST.";
}





