<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de departamentos</title>
    </head>
    <body>
        <div id="navegador">
            <ul>
                <li><a href="consultadepto.php">Inicio</a></li>
                <li><a href="listaDepartamentos.php">Lista de departametnos</a></li>
                <li><a href="formulariodepartamento.php">Agregar departamento</a></li>
                <li><a href="formularioalumno.php">Agregar alumno</a></li>
            </ul>
        </div>
        <h2>Nuevo Departamento:</h2><br>
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
    </body>
</html>
