<?php
 
require('../config/conexion.php');

$nit = $_POST["nit"];
$nombre = $_POST["nombre"];

$query = "INSERT INTO `empresa_de_buses`(`nit`,`nombre`) VALUES ($nit, '$nombre')";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result):
	header("Location: empresa_de_buses.php");
else:
	echo "Ha ocurrido un error al crear la empresa de buses";
endif;

mysqli_close($conn);