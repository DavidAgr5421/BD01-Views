<?php
include "../includes/header.php";
?>

<h1 class="mt-3">Entidad análoga a TALLER (EMPRESA DE BUSES)</h1>

<div class="formulario p-4 m-3 border rounded-3">

    <form action="empresa_de_buses_insert.php" method="post" class="form-group">

        <div class="mb-3">
            <label for="nit" class="form-label">NIT</label>
            <input type="number" class="form-control" id="nit" name="nit" required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>

    </form>
    
</div>

<h2>Selección</h2>
<?php
require("empresa_de_buses_select.php");

if($resultadoEmpresaDeBuses and $resultadoEmpresaDeBuses->num_rows > 0):
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
            if ($resultadoEmpresaDeBuses):
                foreach ($resultadoEmpresaDeBuses as $empresa):
            ?>

            <tr>
                <td class="text-center"><?= $empresa["nit"]; ?></td>
                <td class="text-center"><?= $empresa["nombre"]; ?></td>
            </tr>

            <?php
                endforeach;
            endif;
            ?>

        </tbody>

    </table>
</div>

<?php
endif;

include "../includes/footer.php";
?>