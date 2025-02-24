<?php
# para poder seleccionar los codigos de las garantias de reparaciones (codigos de viaje general)

require("../config/conexion.php");

$query = "SELECT codigo FROM viaje_general";

$resultadoCodigosViaje = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);