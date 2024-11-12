<div class="container">
    <div class="row">
        <div class="col">
            <h2>Administrar Usuarios</h2>
            <a href="<?= base_url('cuentas/add/'); ?>" class="btn btn-success">Agregar Usuario</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>IdUsuario</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach($cuentasD as $key) : ?>
                        <tr>
                            <td><?= $key->idUsuario ?></td>
                            <td><?= $key->user ?></td>
                            <td><?= $key->tipo ?></td>
                            <td>
                                <a href="<?= base_url('cuentas/delete/'.$key->idUsuario); ?>" class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('cuentas/edit/'.$key->idUsuario); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>