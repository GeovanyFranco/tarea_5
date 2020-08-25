<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

function verificardatos() {
    $verifica = 0;  // todo OK

    return $verifica;
}

function insertarDepartamento() {
    require 'database.php';
    $ingreso = $_POST['departamento'];
    echo $ingreso;
    $q = "INSERT INTO departamento (nombre) VALUES ('" . $_POST['departamento'] . "')";
    echo $q;
    $s = mysqli_query($conn, $q);
    mysqli_close($conn);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear nuevo registro de departamento</title>
    </head>
    <body>
        <?php
        $r = verificardatos();
        if ($r == 0) {
            insertarDepartamento();
            echo "<br>Registro grabado!<br>";
            echo "<a href='listadopordepto.php?listadeptos=" . $_POST['departamento'] . "'>Ver Listado</a>";
        } else {
            // redireccionar a pagina de error
            header('Location: http://localhost/LabDemo/error.php?codigo=' . $r);
        }
        ?>
    </body>
</html>