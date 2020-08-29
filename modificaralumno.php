<?php

function verificardatos() {
    $verifica = 0;  // todo OK
    // busca una cadena de caracteres dentro de otra
    $dominio = strstr($_POST['email'], "@");

    // compara dos cadenas de caracteres
    if (strcmp($dominio, "@gmail.com") != 0) {
        // dominio no permitido
        $verifica = -1;
    } else if (strcmp($_POST['email'], $_POST['email2']) != 0) {
        // confirmacion de email no valida
        $verifica = -2;
    }

    return $verifica;
}

function insertar() {
    require 'database.php';

    //echo $_POST['fechanac'];
    $anio = date('Y', strtotime($_POST['nacimiento']));
    $mes = date('m', strtotime($_POST['nacimiento']));
    $dia = date('d', strtotime($_POST['nacimiento']));

    //generando fecha en formato 'yyyy-mm-dd' para ser almacenada en la base de datos
    $fecha = $anio . "-" . $mes . "-" . $dia;

    $q = "UPDATE alumnos SET "
            . "nombre1='" . $_POST['nombre1'] . "', "
            . "apellido1='" . $_POST['apellido1'] . "', "
            . "telefono='" . $_POST['telefono'] . "', "
            . "email='" . $_POST['email'] . "', "
            . "genero='" . $_POST['genero'] . "', "
            . "fechanacimiento='" . $_POST['nacimiento'] . "', "
            . "codigodepto='" . $_POST['departamentoid'] . "' "
            . "WHERE codigo =" . $_POST['modificar'];

    echo $q;
    $s = mysqli_query($conn, $q);

    //mysqli_free_result($s);
    mysqli_close($conn);
}
insertar();
echo '<br>alumno modificado';
echo '<a href="listaAlumnos.php">Regresar</a>';

?>