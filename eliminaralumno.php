<?php

function eliminar() {
    require 'database.php';

    $q = "DELETE FROM alumnos WHERE codigo = " . $_POST['elimnar'];
    echo $q;
    $s = mysqli_query($conn, $q);
    //mysqli_free_result($s);
    mysqli_close($conn);
}

eliminar();
echo '<br>alumno eliminado';
echo '<a href="listaAlumnos.php">Regresar</a>';
?>

