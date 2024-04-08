<?php

class responsableV {
    // clase para guardar la informacion de la persona responsable del viaje

    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numEmpleado, $numLicencia, $nombre, $apellido)
    {
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNumEmpleado() {
        return $this->numEmpleado;
    }
    public function setNumEmpleado($numEmpleado) {
        $this->numEmpleado = $numEmpleado;
    }

    public function getNumLicencia() {
        return $this->numLicencia;
    }
    public function setNumLicencia($numLicencia) {
        $this->numLicencia = $numLicencia;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function __toString()
    {
        return "Numero de empleado: " . $this->getNumEmpleado() . " Numero de licencia: " . $this->getNumLicencia() . " Nombre: " . $this->getNombre() . " Apellido: " . $this->getApellido();
    }
}