<?php
include "../includes/header.php";
?>

<h1 class="mt-3">Entidad análoga a REPARACIÓN (Viaje general)</h1>

<h2 class="mt-3">Inserción</h2>
<div class="formulario p-4 m-3 border rounded-3">

    <form action="viaje_general_insert.php" method="post" class="form-group">

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="number" class="form-control" id="codigo" name="codigo" required>
        </div>

        <div class="mb-3">
            <label for="fecha_creacion" class="form-label">Fecha de creación</label>
            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
        </div>

        <div class="mb-3">
            <label for="fecha_hora_salida" class="form-label">Fecha y hora de salida</label>
            <input type="datetime-local" class="form-control" id="fecha_hora_salida" name="fecha_hora_salida" required>
        </div>

        <div class="mb-3">
            <label for="fecha_hora_llegada" class="form-label">Fecha y hora de llegada</label>
            <input type="datetime-local" class="form-control" id="fecha_hora_llegada" name="fecha_hora_llegada" required>
        </div>

        <div class="mb-3">
            <label for="costo" class="form-label">Costo</label>
            <input type="number" class="form-control" id="costo" name="costo" required>
        </div>

        <div class="mb-3">
            <label for="bus" class="form-label">Bus</label>
            <select name="bus" id="bus" class=form-select required>
                <option value="" selected disabled hidden>Selecciona el bus asociado</option>
                <?php
                    require("../utils/select_bus.php");
                    foreach ($resultadoCodigosBus as $bus):
                ?>

                <option value="<?= $bus["codigo"]; ?>"><?= $bus["codigo"]; ?></option>
                
                <?php
                    endforeach;
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="premio_de" class="form-label">Premio del viaje</label>
            <select name="premio_de" id="premio_de" class=form-select>
                
                <option value="" selected disabled hidden>Selecciona un viaje</option>                
                
                <?php
                require("../utils/select_viaje_general.php");
                    
                if ($resultadoCodigosViaje):
                    foreach ($resultadoCodigosViaje as $viaje):
                ?>
                
                <option value="<?= $viaje["codigo"] ?>"><?= $viaje["codigo"]; ?></option>

                <?php
                    endforeach;
                endif;
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>

    </form>
    
</div>

<h2 class="mt-3">Selección</h2>
<?php
require("viaje_general_select.php");

if($resultadoViajes and $resultadoViajes->num_rows > 0):
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
            foreach ($resultadoViajes as $viaje):
            ?>

            <tr>
                <td class="text-center"><?= $viaje["codigo"]; ?></td>
                <td class="text-center"><?= $viaje["fecha_creacion"]; ?></td>
                <td class="text-center"><?= $viaje["fecha_hora_salida"]; ?></td>
                <td class="text-center"><?= $viaje["fecha_hora_llegada"]; ?></td>
                <td class="text-center"><?= $viaje["costo"]; ?></td>
                <td class="text-center"><?= $viaje["bus"]; ?></td>
                <td class="text-center"><?= $viaje["premio_de"]; ?></td>
            </tr>

            <?php
            endforeach;
            ?>

        </tbody>

    </table>
</div>

<?php
endif;

include "../includes/footer.php";
?>