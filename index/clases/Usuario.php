<?php

class Usuario {
    
    public function __construct(
    public $nombre,  
    public $apellido,
    public $mail, 
    public $password
    ){}


    public function darAltaUsuario() {

        $db = new Database();
        $conn = $db->connect();

        $sql_usuario = 
        "INSERT INTO usuarios (nombre_usuario, apellido_usuario, mail_usuario, password_usuario)
                    VALUES (:nombre_usuario, :apellido_usuario, :mail_usuario, :password_usuario)";
        
        $stmt = $conn->prepare($sql_usuario);
        $stmt->bindParam(':nombre_usuario', $this->nombre);
        $stmt->bindParam(':apellido_usuario', $this->apellido);
        $stmt->bindParam(':mail_usuario', $this->mail);
        $stmt->bindParam(':password_usuario', $this->password);
        
        return $stmt->execute();
    }
}


?>