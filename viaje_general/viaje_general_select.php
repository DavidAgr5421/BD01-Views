<?php

require('../config/conexion.php');

$query = "SELECT * FROM viaje_general";

$resultadoViajes = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);