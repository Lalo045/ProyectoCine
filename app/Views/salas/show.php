<div class="container">
    <div class="row">
        <div class="col">
            <h2>Administrar Salas</h2>
        </div>
        <div class="col-2">
        <a href="<?= base_url('salas/add/'); ?>" class="btn btn-success">Agregar Sala</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>IdSala</th>
                    <th>Numero de sala</th>
                    <th>Tipo</th>
                    <th>Cantidad de asientos</th>
                    <th>Numero de salidas</th>
                    <th>Tamaño</th>
                    <th>Descripcion</th>
                </thead>
                <tbody>
                    <?php foreach($salasD as $key) : ?>
                        <tr>
                            <td><?= $key->idSala ?></td>
                            <td><?= $key->numeroSala ?></td>
                            <td><?= $key->tipo ?></td>
                            <td><?= $key->cantidadAsientos ?></td>
                            <td><?= $key->noSalidas ?></td>
                            <td><?= $key->tamaño ?></td>
                            <td><?= $key->descripcion ?></td>
                            <td>
                                <a href="<?= base_url('salas/delete/'.$key->idSala); ?>" class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('salas/edit/'.$key->idSala); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>