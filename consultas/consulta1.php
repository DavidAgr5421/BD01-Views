<?php
include "../includes/header.php";
?>

<h1 class="mt-3">3 reparaciones (viajes generales) de mayor valor</h1>

<p class="mt-3">
    Mostrar los datos de las tres reparaciones (viajes generales) de mayor valor
    junto con los datos de los mecánicos (buses) asociados a cada una de estas reparaciones.
</p>

<?php
require('../config/conexion.php');

$query = "SELECT viaje_general.codigo AS viaje_general_codigo,
viaje_general.fecha_creacion AS viaje_general_fecha_creacion,
viaje_general.fecha_hora_salida AS viaje_general_fecha_hora_salida,
viaje_general.fecha_hora_llegada AS viaje_general_fecha_hora_llegada,
viaje_general.costo AS viaje_general_costo,
viaje_general.bus AS viaje_general_bus,
viaje_general.premio_de AS viaje_general_premio_de,
bus.codigo AS bus_codigo,
bus.placa AS bus_placa,
bus.modelo AS bus_modelo,
bus.capacidad AS bus_capacidad,
bus.bitacora_mantenimiento AS bus_bitacora_mantenimiento,
bus.empresa AS bus_empresa
FROM viaje_general
LEFT JOIN bus 
  ON viaje_general.bus = bus.codigo
ORDER BY viaje_general.costo DESC
LIMIT 3";

$resultadoC1 = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);
?>

<?php
if($resultadoC1 and $resultadoC1->num_rows > 0):
?>

<div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">

    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">Código</th>
                <th scope="col" class="text-center">Fecha de creación</th>
                <th scope="col" class="text-center">Fecha y hora de salida</th>
                <th scope="col" class="text-center">Fecha y hora de llegada</th>
                <th scope="col" class="text-center">Costo</th>
                <th scope="col" class="text-center">Premio del viaje</th>
                <th scope="col" class="text-center">Bus</th>
                <th scope="col" class="text-center">Placa</th>
                <th scope="col" class="text-center">Modelo</th>
                <th scope="col" class="text-center">Capacidad</th>
                <th scope="col" class="text-center">Bitacora de mantenimiento</th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($resultadoC1 as $fila):
            ?>

            <tr>
                <td class="text-center"><?= $fila["viaje_general_codigo"]; ?></td>
                <td class="text-center"><?= $fila["viaje_general_fecha_creacion"]; ?></td>
                <td class="text-center"><?= $fila["viaje_general_fecha_hora_salida"]; ?></td>
                <td class="text-center"><?= $fila["viaje_general_fecha_hora_llegada"]; ?></td>
                <td class="text-center"><?= $fila["viaje_general_costo"]; ?></td>
                <td class="text-center"><?= $fila["viaje_general_premio_de"]; ?></td>
                <td class="text-center"><?= $fila["bus_codigo"]; ?></td>
                <td class="text-center"><?= $fila["bus_placa"]; ?></td>
                <td class="text-center"><?= $fila["bus_modelo"]; ?></td>
                <td class="text-center"><?= $fila["bus_capacidad"]; ?></td>
                <td class="text-center"><?= $fila["bus_bitacora_mantenimiento"]; ?></td>
            </tr>

            <?php
            endforeach;
            ?>

        </tbody>

    </table>
</div>

<?php
else:
?>

<div class="alert alert-danger text-center mt-5">
    No se encontraron resultados para esta consulta
</div>

<?php
endif;

include "../includes/footer.php";
?>