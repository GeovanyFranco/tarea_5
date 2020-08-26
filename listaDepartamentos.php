<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require 'database.php'
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Listado de departamentos</h2>
        <?php
        // put your code here
        $consulta = "SELECT * FROM `departamento`";
        //Ejecutando consulta
        $departamentos = mysqli_query($conn, $consulta);
        
        if (mysqli_num_rows($departamentos) < 1) {
            echo '<br>No hay departamentos registrados';
        } else {
            echo "<table border = '1'>\n";
            echo "<th>Nombre</th>\n";
            while ($row = mysqli_fetch_array($departamentos)) {
                echo "<tr>";
                    echo "<td>" . $row['nombre']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($conn);
        }
        ?>
        <br>
        <a href="formulariodepartamento.php">Agregar nuevo departamento</a>
    </body>
</html>
