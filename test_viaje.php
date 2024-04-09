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
    $opcion = trim(fgets(STDIN));

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
            echo "Ingrese apellido del responsable: \n";
            $apellidoResponsable = trim(fgets(STDIN));
            
            $objResponsable = new responsableV($numEmpleado, $numLicencia, $nombreResponsable, $apellidoResponsable);

            $viaje = new Viaje($codigo, $destino, $cantMaxPasajeros, $objResponsable);

            echo "Ahora agregue pasajeros al viaje: \n";
            echo "Cuantos pasajeros quiere agregar: \n";
            $cantPasajeros = trim(fgets(STDIN));

            while ($cantMaxPasajeros < $cantPasajeros || (!is_numeric($cantPasajeros))) {
                echo "Supero el limite de pasajeros, porfavor ingrese de nuevo la cantidad: \n";
                $cantPasajeros = trim(fgets(STDIN));
            }
            
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
        break;

        case 2:
            if ($viaje == null) {
                echo "No existe ningun viaje registrado.\n";
                echo "Primero debe cargar un viaje. \n";
            } else {
                $infoViaje = $viaje->__toString();
                echo $infoViaje;
            }
        break;

        case 3:
            $opcionDos = null;

            if ($viaje == null) {
                echo "No existe ningun viaje registrado.\n";
                echo "Primero debe cargar un viaje. \n";
            } else {
                while ($opcionDos != 8) {
                    echo "1- Modificar codigo del viaje. \n";
                    echo "2- Modificar destino del viaje. \n";
                    echo "3- Modificar la cantidad maxima de pasajeros. \n";
                    echo "4- Modificar responsable. \n";
                    echo "5- Modificar algun pasajero. \n";
                    echo "6- Agregar nuevo pasajero. \n";
                    echo "7- Eliminar pasajero. \n";
                    echo "8- Salir. \n\n";

                    echo "Elija una opcion: \n\n";
                    $opcionDos = trim(fgets(STDIN));

                    if ($opcionDos > 8 || $opcionDos < 1) {
                        echo "Opcion invalida, vuelva a intentarlo\n\n";
                        continue; // Se salta el resto de la iteración y vuelve a la condicion del bucle while
                    }

                    switch ($opcionDos) {
                        case 1:
                            echo "Ingrese nuevo codigo de viaje: \n";
                            $nuevoCodigoViaje = trim(fgets(STDIN));
                            $viaje->setCodigoDeViaje($nuevoCodigoViaje);
                        break;

                        case 2:
                            echo "Ingrese nuevo destino del viaje: \n";
                            $nuevoDestinoViaje = trim(fgets(STDIN));
                            $viaje->setDestino($nuevoDestinoViaje);
                        break;

                        case 3:
                            echo "Ingrese nueva cantidad maxima de pasajeros: \n";
                            $nuevaCantidadMax = trim(fgets(STDIN));
                            $viaje->setCantMaxPasajeros($nuevaCantidadMax);
                        break;

                        case 4:
                            echo "Ingrese numero de empleado del responsable que quiere modificar: \n";
                            $numEmpleado = trim(fgets(STDIN));

                            if ($numEmpleado == $viaje->getResponsable()->getNumEmpleado()) {
                                echo "Ahora ingrese los nuevos datos que quiere modificar: \n";
                                echo "Numero de licencia: \n";
                                $nuevoNumLicencia = trim(fgets(STDIN));
                                echo "Nombre del responsable: \n";
                                $nuevoNombreResponsable = trim(fgets(STDIN));
                                echo "Apellido del responsable: \n";
                                $nuevoApellidoResponsable = trim(fgets(STDIN));

                                $viaje->modificarResponsable($numEmpleado, $nuevoNumLicencia, $nuevoNombreResponsable, $nuevoApellidoResponsable);
                            } else {
                                echo "Ningun numero de empleado coincide con el del responsable. Porfavor intente de nuevo. \n";
                            }
                        break;

                        case 5:
                            echo "Ingrese numero del pasajero que quiere modificar: \n";
                            echo "Numero del pasajero: \n";
                            $numP = trim(fgets(STDIN));
                            echo "Ingrese el numero documento del pasajero: \n";
                            $docPasajero = trim(fgets(STDIN));
                            echo "Ingrese nuevo nombre: \n";
                            $nuevoNombrePasajero = trim(fgets(STDIN));
                            echo "Ingrese nuevo apellido: \n";
                            $nuevoApellidoPasajero = trim(fgets(STDIN));
                            echo "Ingrese el nuevo numero de telefono: \n";
                            $nuevoTelefonoPasajero = trim(fgets(STDIN));

                            $viaje->modificarPasajero($numP, $nuevoNombrePasajero, $nuevoApellidoPasajero, $docPasajero, $nuevoTelefonoPasajero);
                        break;

                        case 6:
                            $coleccionPasajeros = $viaje->getPasajeros();
                            if (count($coleccionPasajeros) > $viaje->getCantMaxPasajeros()) {
                                echo "\n No pueden ingresar mas pasajeros al viaje.\n";
                                echo "\n Modificar la cantidad maxima de pasajeros para poder agregar más.\n";
                            } else {
                                echo "Ingrese datos del nuevo pasajero: \n";
                                echo "Ingrese nombre del pasajero: \n";
                                $nombrePasajero = trim(fgets(STDIN));
                                echo "Ingrese apellido del pasajero: \n";
                                $apellidoPasajero = trim(fgets(STDIN));
                                echo "Ingrese numero documento del pasajero: \n";
                                $docPasajero = trim(fgets(STDIN));
                                echo "Ingrese numero de telefono del pasajero: \n";
                                $telefonoPasajero = trim(fgets(STDIN));

                                $pasajeroAgregado = $viaje->nuevoPasajero($nombrePasajero, $apellidoPasajero, $docPasajero, $telefonoPasajero);
                                echo $pasajeroAgregado;
                            }
                        break;

                        case 7:
                            $colPasajeros = $viaje->getPasajeros();
                            $indiceP = 0;

                            echo "Lista de pasajeros: \n";
                            
                            foreach ($colPasajeros as $pasajero) {
                                $indiceP = $indiceP + 1;
                                echo "\n Pasajero: " . $indiceP;
                                echo "\n Nombre: " . $pasajero->getNombre();
                                echo "\n Apellido: " . $pasajero->getApellido();
                                echo "\n Numero de documento: " . $pasajero->getNumDoc();
                                echo "\n Telefono: " . $pasajero->getTelefono() . "\n";
                            }

                            echo "Ingrese numero del pasajero que quiere sacar del viaje: \n";
                            $indiceP = trim(fgets(STDIN));

                            while ($indiceP > count($colPasajeros)){
                                echo "\nNumero invalido, vuelva a ingresar el numero de pasajero...";
                                echo "\nIngresar: ";
                                $indiceP = trim(fgets(STDIN));
                            }

                            $viaje->eliminaPasajero($indiceP);
                        break;

                        case 8:
                            echo "Saliendo...";
                        break;
                    }
                }
            }
        break;

        case 4:
            echo "Saliendo...";
        break;
    }
}

?>