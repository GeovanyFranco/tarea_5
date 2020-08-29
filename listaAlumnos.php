<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'database.php';

function llenardeptos() {
    // enviando el comando SQL
    $deptos = mysqli_query($conn, "SELECT codigo, nombre FROM departamento order by nombre");
    if (mysqli_num_rows($deptos) < 1) {
        exit("No hay departamentos registrados!");
    }

    echo "<select name='deptos'>";
    while ($row = mysqli_fetch_array($deptos)) {
        echo "<option value=" . $row['codigo'] . ">" . $row['nombre'];
        echo "</option>";
    }
    echo "</select>";
    // cerrando la conexion a la BDD
    mysqli_free_result($deptos);
    mysqli_close($conn);
}
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
        <?php
        $consultaAlumnos = "SELECT `codigo`,`nombre1`,`nombre2`,`apellido1`,"
                . "`apellido2`,`direccion`,`telefono`,`email`,`genero`,"
                . "`fechanacimiento`,`codigodepto` "
                . "FROM `alumnos`";
        $alumnos = mysqli_query($conn, $consultaAlumnos);

        if (mysqli_num_rows($alumnos) < 1) {
            echo "<br>Lista vacia";
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
                echo "<td>" . $row['nombre1'] . " " . $row['nombre2'] . "</td>";
                echo "<td>" . $row['apellido1'] . " " . $row['apellido2'] . "</td>";
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
        <hr>
        <h2>Modificar Alumno:</h2><br>
        <form action="modificaralumno.php" method="post">
            <table class="formulario">
                <tr>
                    <td>Codigo:</td>
                    <td><input type="text" name="modificar" required></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre1" size="50" required></td>
                </tr>
                <tr>
                    <td>Apellido:</td>
                    <td><input type="text" name="apellido1" size="50" required></td>
                </tr>
                <tr>
                    <td>Telefono:</td>
                    <td><input type="numer" name="telefono" maxlength="8" size="20"></td>
                </tr>
                <tr>
                    <td>EMail:</td>
                    <td><input type="email" name="email" size="40" required><br></td>
                </tr>
                <tr>
                    <td>Confirmar Email:</td>
                    <td><input type="email" name="email2" size="40" required></td>
                </tr>
                <tr>
                    <td>Genero:</td>
                    <td>
                        <input type="radio" name="genero" value="M">Masculino<br>
                        <input type="radio" name="genero" value="F">Femenino
                    </td>
                </tr>
                <tr>
                    <td>Fecha de nacimiento:</td>
                    <td><input type="date" name="nacimiento" required></td>
                </tr>
                <tr>
                    <td>Departamento:</td>
                    <td><input type="text" name="departamentoid" size="40" ></td>
                </tr>
                <td colspan="2">

                </td>
            </table>
            <input class="btn-enviar" type="submit" value="Grabar">
            <input class="btn-limpiar" type="reset" value="Limpiar">
        </form>
        <hr>
        <h2>Eliminar Alumno:</h2><br>
        <form action="eliminaralumno.php" method="post">
            <table class="formulario">
                <tr>
                    <td>Codigo:</td>
                    <td><input type="text" name="elimnar" required></td>
                </tr>
            </table>
            <input class="btn-enviar" type="submit" value="Grabar">
            <input class="btn-limpiar" type="reset" value="Limpiar">
        </form>        
    </body>
</html>
