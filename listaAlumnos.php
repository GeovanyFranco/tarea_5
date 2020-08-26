<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'database.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="navegador">
            <ul>
                <li><a href="consultadepto.php">Inicio</a></li>
                <li><a href="listaDepartamentos.php">Lista de departametnos</a></li>
                <li><a href="listaAlumnos.php">Listado de alumnos</a></li>
                <li><a href="formularioalumno.php">Agregar alumno</a></li>
            </ul>
        </div>
        <?php
        $consultaAlumnos = "SELECT `codigo`,`nombre1`,`nombre2`,`apellido1`,"
                . "`apellido2`,`direccion`,`telefono`,`email`,`genero`,"
                . "`fechanacimiento`,`codigodepto` "
                . "FROM `alumnos`";
        $alumnos = mysqli_query($conn, $consultaAlumnos);

        if (mysqli_num_rows($alumnos) < 1) {
            echo "<br>Lista bacia";
            echo "<br>";
        } else {
            echo "<table border='1'>\n";
            echo "<th>Codigo</th>\n";
            echo "<th>Nombre</th>\n";
            echo "<th>Apellido</th>\n";
            echo "<th>Direccion</th>\n";
            echo "<th>Telefono</th>\n";
            echo "<th>Email</th>\n";
            echo "<th>Genero</th>\n";
            echo "<th>Fecha de Nacimiento</th>\n";

            while ($row = mysqli_fetch_array($alumnos)) {
                echo "<tr>";
                echo "<td>" . $row['codigo'] . "</td>";
                echo "<td>" . $row['nombre1'] ." ". $row['nombre2']. "</td>";
                echo "<td>" . $row['apellido1'] ." ". $row['apellido2']. "</td>";
                echo "<td>" . $row['direccion'] . "</td>";
                echo "<td>" . $row['telefono'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['genero'] . "</td>";
                echo "<td>" . $row['fechanacimiento'] . "</td>";
                echo "</tr>";
            }
            echo '</table>';
            mysqli_close($conn);
        }
        ?>
        <br>
        <a href="formularioalumno.php">Agregar nuevo</a>
    </body>
</html>
