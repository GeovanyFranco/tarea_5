<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

function eliminarDepartamento() {
    require 'database.php';
    $id = $_POST['id'];
    echo '<h2>El id que se borrara es <strong>' . $id . '</strong></h2>';
    $delete = "DELETE FROM `departamento` WHERE codigo=" . $id;
    echo '<br> La sentencia SQL es: <br> <p text-indent:"15">' . $delete .'</p><hr>';
    $s = mysqli_query($conn, $delete);
    
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
            eliminarDepartamento();
            echo '<br><strong>Resutlado:</strong>   El departamento con el id <strong>' . $_POST['id'] . '</strong> ha sido borrado con exito<br>';
            echo "<hr><a href='listaDepartamentos.php'>Ver Listado de departametnos</a>";
            ?>
    </body>
</html>
