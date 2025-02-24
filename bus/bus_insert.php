<?php
 
require('../config/conexion.php');

$codigo = $_POST["codigo"];
$placa = $_POST["placa"];
$modelo = $_POST["modelo"];
$capacidad = $_POST["capacidad"];
$bitacora_mantenimiento = $_POST["bitacora_mantenimiento"];
$empresa = $_POST["empresa"];

$query = "INSERT INTO `bus`(`codigo`,`placa`,`modelo`,`capacidad`,`bitacora_mantenimiento`,`empresa`) VALUES ($codigo,'$placa',$modelo,$capacidad,'$bitacora_mantenimiento',$empresa)";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result):
	header("Location: bus.php");
else:
	echo "Ha ocurrido un error al crear el bus";
endif;

mysqli_close($conn);