<?php

$data = $_POST;

require_once 'clases/Persona.php';

class Profesor extends Persona {
    
    public $nLegajo;

    public function __construct($nombre, $apellido, $dni, $nLegajo){
        parent::__construct($nombre, $apellido, $dni);
        $this->nLegajo = $nLegajo;
    }

    public function nombreProfesor(){
        $nombreProfesor = $this->nombre;
            return $nombreProfesor;
    }

    public function apellidoProfesor(){
        $apellidoProfesor = $this->apellido;
            return $apellidoProfesor;
    }

    

    
    
}

$profesor1 = new Profesor ($data ['nombre'], $data ['apellido'], $data ['dni'], $data ['nLegajo']);
 




?>

