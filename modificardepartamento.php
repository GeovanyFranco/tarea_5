<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

function actualizar() {
    require 'database.php';
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    echo '<h2>El id que se modificara es <strong>' . $id . '</strong> y el nombre es <strong>' . $nombre . '</strong></h2>';
    $modificar = "UPDATE departamento SET nombre='" . $nombre . "' WHERE codigo = " . $id;
    echo '<br> La sentencia SQL es: <br> <p>' . $modificar . '</p><hr>';
    $s = mysqli_query($conn, $modificar);
    mysqli_close($conn);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        actualizar();
        echo '<br><strong>Resutlado:</strong>   El departamento con el id <strong>' . $_POST['id'] . '</strong> ha sido modificado con exito<br>';
        echo "<hr><a href='listaDepartamentos.php'>Ver Listado de departametnos</a>";
        ?>
    </body>
</html>
