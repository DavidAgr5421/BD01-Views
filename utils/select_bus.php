<?php
# para poder seleccionar las cedulas de los mecanicos (códigos de los buses)
# en la inserción de reparación (viaje general)

require("../config/conexion.php");

$query = "SELECT codigo FROM bus";

$resultadoCodigosBus = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);