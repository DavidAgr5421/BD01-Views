<?php
include "../includes/header.php";
?>

<h1 class="mt-3">Reparaciones (viajes generales) de un taller (bus) han requirido garantía (han sido premiados)</h1>

<p class="mt-3">
    El código de un taller (empresa de buses). Se debe mostrar todos los datos de las reparaciones (viajes generales) de
    ese taller (empresa de buses) que han requerido garantía (han sido premiados).
</p>

<div class="formulario p-4 m-3 border rounded-3">

    <form action="busqueda2.php" method="post" class="form-group">

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="number" class="form-control" id="codigo" name="codigo" required>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>

    </form>
    
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'):

    require('../config/conexion.php');

    $codigo = $_POST["codigo"];

    $query = "SELECT viaje_general.*
    FROM viaje_general
    LEFT join viaje_general AS viaje_general2
    	ON viaje_general.codigo = viaje_general2.premio_de
    LEFT JOIN bus
      ON viaje_general2.bus = bus.codigo
    WHERE bus.empresa = $codigo";

    $resultadoB2 = mysqli_query($conn, $query) or die(mysqli_error($conn));

    mysqli_close($conn);

    if($resultadoB2 and $resultadoB2->num_rows > 0):
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
                <th scope="col" class="text-center">Bus</th>
                <th scope="col" class="text-center">Premio del viaje</th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($resultadoB2 as $fila):
            ?>

            <tr>
                <td class="text-center"><?= $fila["codigo"]; ?></td>
                <td class="text-center"><?= $fila["fecha_creacion"]; ?></td>
                <td class="text-center"><?= $fila["fecha_hora_salida"]; ?></td>
                <td class="text-center"><?= $fila["fecha_hora_llegada"]; ?></td>
                <td class="text-center"><?= $fila["costo"]; ?></td>
                <td class="text-center"><?= $fila["bus"]; ?></td>
                <td class="text-center"><?= $fila["premio_de"]; ?></td>
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
endif;

include "../includes/footer.php";
?>