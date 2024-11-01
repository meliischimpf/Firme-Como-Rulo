<?php

class Usuario {
    
    public function __construct(
    public $mail, public $password, public $nombre,  public $apellido){
    }


    public function infoUsuario(){

        return 
                "<strong>Mail: </strong> {$this->mail}<br>
                <strong>Password: </strong> {$this->password}<br>
                <strong>Nombre: </strong> {$this->nombre}<br>
                <strong>Apellido: </strong> {$this->apellido}<br>";
    }


}


?>