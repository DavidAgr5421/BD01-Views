<?php
# para poder seleccionar los códigos de los talleres (nits de las empresas de buses)
# en la inserción de mecánico (bus)

require("../config/conexion.php");

$query = "SELECT nit FROM empresa_de_buses";

$resultadoNitsEmpresa = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);