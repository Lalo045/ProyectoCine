<div class="container">
    <div class="row">
        <div class="col">
            <h2>Administrar asientos</h2>
        </div>
        <div class="col-2">

        <a href="<?= base_url('asientos/add/'); ?>" class="btn btn-success py-1">Agregar asiento</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <th class="text-center">idAsiento</th>
                    <th class="text-center">idSala</th>
                    <th class="text-center">Numero de asiento</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Accion</th>
                </thead>
                <tbody>
                    <?php foreach($asientos as $key) : 
                        ?>
                        <tr>
                            <td><?= $key->idAsiento ?></td>
                            <td><?= $key->idSala ?></td>
                            <td><?= $key->numeroAsiento ?></td>
                            <td><?= $key->estado ?></td>
                            <td class="col-md-auto">
                            <a href="<?=base_url('asientos/delete/'.$key->idAsiento);?> " class="btn btn-danger">Borrar</a>
                            </td>
                       
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
