<?php

include_once "responsableV.php";
include_once "pasajero.php";

class Viaje {
    // recolecta y modifica los datos de un viaje

    private $codigoDeViaje;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros; // coleccion de pasajeros del viaje que hace referencia a un objeto Pasajero
    private $responsable; // objeto que hace referencia a la clase responsableV
    // private $colPasajeros = array();
    // private $cantPasajeros;


    // metodo constructor de la clase viaje
    public function __construct($codigoDeViaje, $destino, $cantMaxPasajeros, responsableV $responsable){
        $this->codigoDeViaje = $codigoDeViaje;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->pasajeros = array(); // va a devolver una coleccion vacia
        $this->responsable = $responsable;
    }

    // metodos get y set de la clase viaje
    public function getCodigoDeViaje(){
        return $this->codigoDeViaje;
    }
    public function setCodigoDeViaje($codigoDeViaje){
        $this->codigoDeViaje = $codigoDeViaje;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }

    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }

    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function setPasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
    }

    public function getResponsable(){
        return $this->responsable;
    }
    public function setResponsable($responsable){
        $this->responsable = $responsable;
    }

    // metodo para buscar pasajero
    public function buscarPasajero($numDoc) {
        $pasajeroExistente = false;
        foreach ($this->getPasajeros() as $pasajero) {
            if ($pasajero->getNumDoc() == $numDoc) {
                $pasajeroExistente = true;
            }
        }
        return $pasajeroExistente;
    }

    // metodo para modificar los datos de un pasajero
    public function modificarPasajero($indice, $nuevoNombre, $nuevoApellido, $nuevoTelefono, $numDoc) {
        $indice = $indice - 1; // Convertir para acceder al elemento 0
        if (!($this->buscarPasajero($numDoc))) {
            $this->getPasajeros()[$indice]->setNombre($nuevoNombre);
            $this->getPasajeros()[$indice]->setApellido($nuevoApellido);
            $this->getPasajeros()[$indice]->setTelefono($nuevoTelefono);
        }
    }

    // metodo para agregar pasajeros verificando que no este cargado mas de una vez
    public function agregarPasajero($indice, $nombre, $apellido, $numDoc, $telefono) {
        if ($this->buscarPasajero($numDoc) == false) {
            $objPasajero = new Pasajero ($nombre, $apellido, $numDoc, $telefono); // crea una nueva instancia de la clase pasajero con los datos que fueron proporcionados
            $this->getPasajeros()[$indice] = $objPasajero;
        }
        $this->setPasajeros($this->getPasajeros());
    }

    // metodo para agregar a la persona a cargo del viaje
    public function agregarResponsable($responsable) {
        $mensaje = "";
        if ($this->getResponsable()->getNumEmpleado() == $responsable->getNumEmpleado()) {
            $mensaje = "Ya se encuentra este responsable a cargo del viaje.";
        } else {
            $this->setResponsable($responsable);
            $mensaje = "Responsable agregado.";
        }
        return $mensaje;
    }

    // Metodo para modificar a la persona a cargo del viaje
    public function modificarResponsable($numEmpleado, $numLicencia, $nombre, $apellido) {
        $mensaje = "";
        if ($this->getResponsable() != null && $this->getResponsable()->getNumEmpleado() == $numEmpleado) {
            $this->getResponsable()->setNumLicencia($numLicencia);
            $this->getResponsable()->setNombre($nombre);
            $this->getResponsable()->setApellido($apellido);
            $mensaje = "Responsable modificado exitosamente.";
        } else {
            $mensaje = "La persona a la que quiere cambiarle sus datos no se encuentra en el viaje.";
        }
        $this->setResponsable($this->getResponsable());
        return $mensaje;
    }


    // metodo para agregar un nuevo pasajero
    public function nuevoPasajero($nombre, $apellido, $numDoc, $telefono) {
        $mensaje = "";
        $colPasajeros = $this->getPasajeros();
        if (count($colPasajeros) < $this->getCantMaxPasajeros()) {
            $objPasajero = new Pasajero ($nombre, $apellido, $numDoc, $telefono);
            array_push($colPasajeros, $objPasajero);
            $this->setPasajeros($colPasajeros);
            $mensaje = "Nuevo pasajero agregado.";
        } else {
            $mensaje = "No pueden ingresar mas pasajeros al viaje.";
        }
        return $mensaje;
    }


    // metodo para mostrar la coleccion de pasajero
    public function mostrarColPasajero() {
        $colPasajeros = $this->getPasajeros();
        $cadena = "";

        foreach ($colPasajeros as $indice => $pasajero) { // en cada iteracion, se accede a la informacion de $pasajero ubicada en $indice
            $cadena = $cadena . "\n\nPasajero: " . ($indice + 1) . " \n";
            foreach ($pasajero as $clave => $valor) { // se accede a la informacion de $valor a travez de la $clave de $pasajeros
                $cadena = $cadena . $clave . ": " . $valor . " \n";
            }
        }
        return $cadena;
    }
}