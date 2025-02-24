<?php

require('../config/conexion.php');

$query = "SELECT * FROM empresa_de_buses";

$resultadoEmpresaDeBuses = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);