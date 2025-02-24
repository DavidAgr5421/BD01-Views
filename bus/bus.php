<?php
include "../includes/header.php";
?>

<h1 class="mt-3">Entidad análoga a MECÁNICO (BUS)</h1>

<div class="formulario p-4 m-3 border rounded-3">

    <form action="bus_insert.php" method="post" class="form-group">

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="number" class="form-control" id="codigo" name="codigo" required>
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" class="form-control" id="placa" name="placa" minlength = "6" maxlength="6" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="number" class="form-control" id="modelo" name="modelo" required>
        </div>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad</label>
            <input type="number" class="form-control" id="capacidad" name="capacidad" required>
        </div>

        <div class="mb-3">
            <label for="bitacora_mantenimiento" class="form-label">Bitacora de mantenimiento</label>
            <input type="text" class="form-control" id="bitacora_mantenimiento" name="bitacora_mantenimiento" required>
        </div>
        
        <div class="mb-3">
            <label for="empresa" class="form-label">Empresa</label>
            <select name="empresa" id="empresa" class="form-select" required>
                
                <option value="" selected disabled hidden></option>

                <?php
                require("../utils/select_empresa.php");
                
                if($resultadoNitsEmpresa):
                    foreach ($resultadoNitsEmpresa as $empresa):
                ?>

                <option value="<?= $empresa["nit"] ?>"><?= $empresa["nit"] ?></option>

                <?php
                    endforeach;
                endif;
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>

    </form>
    
</div>

<h2>Selección</h2>
<?php
require("bus_select.php");
            
if($resultadoBus and $resultadoBus->num_rows > 0):
?>

<div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">

    <table class="table table-striped table-bordered">

        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">Código</th>
                <th scope="col" class="text-center">Placa</th>
                <th scope="col" class="text-center">Modelo</th>
                <th scope="col" class="text-center">Capacidad</th>
                <th scope="col" class="text-center">Bitacora de mantenimiento</th>
                <th scope="col" class="text-center">Empresa</th>
            </tr>
        </thead>

        <tbody>

            <?php
            if ($resultadoBus):
                foreach ($resultadoBus as $bus):
            ?>

            <tr>
                <td class="text-center"><?= $bus["codigo"]; ?></td>
                <td class="text-center"><?= $bus["placa"]; ?></td>
                <td class="text-center"><?= $bus["modelo"]; ?></td>
                <td class="text-center"><?= $bus["capacidad"]; ?></td>
                <td class="text-center"><?= $bus["bitacora_mantenimiento"]; ?></td>
                <td class="text-center"><?= $bus["empresa"]; ?></td>
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