<?php
 
require('../config/conexion.php');

$codigo = $_POST["codigo"];
$fecha_creacion = $_POST["fecha_creacion"];
$fecha_hora_salida = $_POST["fecha_hora_salida"];
$fecha_hora_llegada = $_POST["fecha_hora_llegada"];
$costo = $_POST["costo"];
$bus = $_POST["bus"];
$premio_de = $_POST["premio_de"];

if ($premio_de) {
	$query = "INSERT INTO `viaje_general`(`codigo`,`fecha_creacion`,`fecha_hora_salida`,`fecha_hora_llegada`,`costo`,`bus`,`premio_de`) VALUES ($codigo,'$fecha_creacion','$fecha_hora_salida','$fecha_hora_llegada',$costo,$bus,$premio_de)";
}
else {
	$query = "INSERT INTO `viaje_general`(`codigo`,`fecha_creacion`,`fecha_hora_salida`,`fecha_hora_llegada`,`costo`,`bus`,`premio_de`) VALUES ($codigo,'$fecha_creacion','$fecha_hora_salida','$fecha_hora_llegada',$costo,$bus, NULL)";
}

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($result):
	header("Location: viaje_general.php");
else:
	echo "Ha ocurrido un error al crear el viaje general";
endif;

mysqli_close($conn);