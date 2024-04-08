<?php

// las clases pasajero y responsableV estan incluidas tambien en la clase viaje. (revisar y corregir)
include_once "viaje.php";
include_once "pasajero.php";
include_once "responsableV.php";

echo "\n\nBienvenido a viaje feliz!\n\n";

$viaje = null;

$opcion = 0;


while ($opcion != 4) {
    echo "\nMENU\n";
    echo "1- Cargar informacion del viaje\n";
    echo "2- Ver informacion del viaje\n";
    echo "3- Modificar informacion del viaje\n";
    echo "4- Salir\n\n";

    echo "Seleccione una opcion: ";
    if ($opcion < 1 || $opcion > 4) {
        echo "Opcion invalida, vuelva a intentarlo\n\n";
    }

    switch ($opcion) {
        case 1:
            echo "Ingrese codigo del viaje: \n";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese destino del viaje: \n";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad maxima de pasajeros del viaje: \n";
            $cantMaxPasajeros = trim(fgets(STDIN));

            
            echo "Ahora le vamos a pedir los datos de la persona a cargo del viaje: \n";
            echo "Ingrese numero de empleado: \n";
            $numEmpleado = trim(fgets(STDIN));
            echo "Ingrese numero de licencia: \n";
            $numLicencia = trim(fgets(STDIN));
            echo "Ingrese nombre del responsable: \n";
            $nombreResponsable = trim(fgets(STDIN));
            echo "Ingrese numero del responsable: \n";
            $apellidoResponsable = trim(fgets(STDIN));
            
            $objResponsable = new responsableV($numEmpleado, $numLicencia, $nombreResponsable, $apellidoResponsable);

            $viaje = new Viaje($codigo, $destino, $cantMaxPasajeros, $objResponsable);

            echo "Ahora agregue pasajeros al viaje: \n";
            echo "Cuantos pasajeros quiere agregar: \n";
            $cantPasajeros = trim(fgets(STDIN));

            if ($cantMaxPasajeros < $cantPasajeros && !is_numeric($cantPasajeros)) {
                echo "Supero el limite de pasajeros, porfavor ingrese de nuevo la cantidad: \n";
                $cantPasajeros = trim(fgets(STDIN));
            } else {
                for ($i = 0; $i < $cantPasajeros; $i++) {
                    echo "Pasajero numero: " . ($i + 1) . "\n";
                    echo "Ingrese nombre del pasajero: \n";
                    $nombrePasajero = trim(fgets(STDIN));
                    echo "Ingrese apellido del pasajero: \n";
                    $apellidoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el numero documento del pasajero: \n";
                    $docPasajero = trim(fgets(STDIN));
                    echo "Ingrese el numero de telefono del pasajero: \n";
                    $telefonoPasajero = trim(fgets(STDIN));

                    $viaje->agregarPasajero($i, $nombrePasajero, $apellidoPasajero, $docPasajero, $telefonoPasajero);
                }
            }
        break;

        case 2;
            if ($viaje == null) {
                echo "No existe ningun viaje registrado.\n";
                echo "Primero debe cargar un viaje.";
            } else {
                $infoViaje = $viaje->__toString();
                echo $infoViaje;
            }



        break;

        case 3;
        break;

        case 4;
        break;
    }
}













/* Crear un objeto ResponsableV
$responsable = new ResponsableV($numEmpleado, $numLicencia, $nombre, $apellido);

// Agregar el responsable al viaje
$mensaje = $viaje->agregarResponsable($responsable);

// Imprimir el mensaje
echo $mensaje;
 */

 ?>