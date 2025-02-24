<?php
include "../includes/header.php";
?>

<h1 class="mt-3">Valor total de las reparacione (viajes generales) de un mecánico (bus) durante un rango de fechas.</h1>

<p class="mt-3">
    La cédula de un mecánico (código de un bus) y un rango de fechas (es decir, dos fechas f1 y f2
    (cada fecha con día, mes y año) y f2 &gt;= f1). Se debe mostrar el valor total de las
    reparaciones (viajes generales) correspondientes a ese mecánico (bus) durante ese rango de fechas.
</p>

<div class="formulario p-4 m-3 border rounded-3">

    <form action="busqueda1.php" method="post" class="form-group">

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="number" class="form-control" id="codigo" name="codigo" required>
        </div>

        <div class="mb-3">
            <label for="fecha1" class="form-label">Fecha 1</label>
            <input type="date" class="form-control" id="fecha1" name="fecha1" required>
        </div>

        <div class="mb-3">
            <label for="fecha2" class="form-label">Fecha 2</label>
            <input type="date" class="form-control" id="fecha2" name="fecha2" required>
        </div>

        <button type="submit" class="btn btn-primary">Buscar</button>

    </form>
    
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'):

    require('../config/conexion.php');

    $codigo = $_POST["codigo"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];

    $query = "SELECT sum(viaje_general.costo) AS total FROM viaje_general
    LEFT JOIN bus ON viaje_general.bus = bus.codigo
    WHERE bus.codigo = $codigo AND viaje_general.fecha_creacion BETWEEN '$fecha1' AND '$fecha2'
    group by bus.codigo";

    $resultadoB1 = mysqli_query($conn, $query) or die(mysqli_error($conn));

    mysqli_close($conn);

    if($resultadoB1 and $resultadoB1->num_rows > 0):
?>

<div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">

    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">Valor total</th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($resultadoB1 as $fila):
            ?>

            <tr>
                <td class="text-center"><?= $fila["total"]; ?></td>
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