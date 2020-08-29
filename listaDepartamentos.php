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
        <ol>
            <li><a href="consultadepto.php">Inicio</a></li>
            <li><a href="listaDepartamentos.php">Operaciones departametnos</a></li>
            <li><a href="listaAlumnos.php">Operaciones alumnos</a></li>
        </ol>
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
            echo "<th>Codigo</th>\n";
            echo "<th>Nombre</th>\n";
            while ($row = mysqli_fetch_array($departamentos)) {
                echo "<tr>";
                echo "<td>" . $row['codigo'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_close($conn);
        }
        ?>
        <br>
        <a href="formulariodepartamento.php">Agregar nuevo departamento</a>
        <hr>
        <h2>Nuevo Departamento:</h2>
        <form action="creardepartamento.php" method="post">
            <table border = "0" >
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="departamento" size="50" required></td>
                </tr>
            </table>
            <input type="submit" value="Grabar">
            <input type="reset" value="Limpiar">
        </form>
        <hr>
        <h2>Eliminar departamento</h2>
        <form action="borrardepartamento.php" method="post">
            <table border = "0" >
                <tr>
                    <td>ID:</td>
                    <td><input type="number" name="id" placeholder="Escriba el id" required></td>
                </tr>
            </table>
            <input type="submit" value="Borrar">
            <input type="reset" value="Limpiar area">
        </form>
        <hr>
        <h2>Actualizar departamento</h2>
        <form action="modificardepartamento.php" method="post">
            <table border = "0" >
                <tr>
                    <td>ID:</td>
                    <td><input type="number" name="id" placeholder="Codigo a modificar" required></td>
                    <td>Nombre nuevo:</td>
                    <td><input type="text" name="nombre" placeholder="Nuevo nombre" required></td>
                </tr>
            </table>
            <input type="submit" value="Actualizar">
            <input type="reset" value="Limpiar area">
        </form>
    </body>
</html>
