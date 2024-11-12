<div class="container">
    <div class="row">
        <div class="col">
            <h2>Administrar Funciones</h2>
        </div>
        <div class="col-2">
            <a href="<?= base_url('funciones/add/'); ?>" class="btn btn-success">Agregar Función</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>IdFuncion</th>
                    <th>IdPelicula</th>
                    <th>Numero de sala</th>
                    <th>Cantidad de asientos</th>
                    <th>Asientos disponibles</th>
                    <th>Formato</th>
                    <th>Horario</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach($funcionesD as $key) : ?>
                        <tr>
                            <td><?= $key->idFuncion ?></td>
                            <td><?= $key->idPelicula ?></td> 
                            <td><?= $key->idSala ?></td> 
                            <td><?= $key->cantidadAsientos ?></td>
                            <td>
                            <?= isset($asientosMap[$key->idSala]) ? $asientosMap[$key->idSala] : 'Desconocido'; ?>
                            </td>
                            <td><?= $key->formato ?></td>
                            <td><?= $key->horario ?></td>
                            <td><?= $key->fecha ?></td>
                            <td>
                                <a href="<?= base_url('funciones/delete/'.$key->idFuncion); ?>" class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('funciones/edit/'.$key->idFuncion); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                    


                </tbody>
            </table>
        </div>
    </div>
</div>
