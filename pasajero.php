<?php

class Pasajero {
    // clase que almacena la informacion de un pasajero

    private $nombre;
    private $apellido;
    private $numDoc;
    private $telefono;

    public function __construct($nombre, $apellido, $numDoc, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDoc = $numDoc;
        $this->telefono = $telefono;
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

    public function getNumDoc() {
        return $this->numDoc;
    }
    public function setNumDoc($numDoc) {
        $this->numDoc = $numDoc;
    }

    public function getTelefono() {
        return $this->telefono;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . " Apellido: " . $this->getApellido() . " Documento: " . $this->getNumDoc() . " Telefono: " . $this->getTelefono();
        //return $this->getNombre() . " " . $this->getApellido() . " " . $this->getNumDoc() . " " . $this->getTelefono();
    }
}