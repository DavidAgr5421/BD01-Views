<?php
include "../includes/header.php";
?>

<h1 class="mt-3">2 talleres (empresas de buses) con mayor cantidad de reparaciones (viajes generales)</h1>

<p class="mt-3">
    Mostrar el código y el nombre de los
    dos talleres (empresas de buses) que tienen la mayor cantidad de reparaciones (viajes generales).
</p>

<?php
require('../config/conexion.php');

$query = "SELECT empresa_de_buses.* FROM viaje_general
LEFT JOIN bus
  ON viaje_general.bus = bus.codigo
LEFT JOIN empresa_de_buses
  ON bus.empresa = empresa_de_buses.nit
GROUP BY empresa_de_buses.nit
ORDER BY count(*) desc
limit 2";

$resultadoC2 = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);
?>

<?php
if($resultadoC2 and $resultadoC2->num_rows > 0):
?>

<div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">

    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">NIT</th>
                <th scope="col" class="text-center">Nombre</th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($resultadoC2 as $fila):
            ?>

            <tr>
                <td class="text-center"><?= $fila["nit"]; ?></td>
                <td class="text-center"><?= $fila["nombre"]; ?></td>
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