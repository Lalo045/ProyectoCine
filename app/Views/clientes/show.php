<div class="container">
    <div class="row">
        <div class="col">
            <h2>Administrar Clientes</h2>
        </div>
        <div class="col-2">
        <a href="<?= base_url('clientes/add/'); ?>" class="btn btn-success">Agregar Cliente</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <th>IdCliente</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach($clientesD as $key) : 
                        //Para calcular la edad del cliente
                        $fechaNacimiento = new DateTime($key->fechaNacimiento);
                        $hoy = new DateTime();
                        $edad = $hoy->diff($fechaNacimiento)->y;
                        ?>
                        <tr>
                            <td><?= $key->idCliente ?></td>
                            <td><?= $key->nombre ?> <?= $key->apellidoP ?> <?= $key->apellidoM ?></td>
                            <td><?= $edad?> años</td>
                            <td><?= $key->sexo ?></td>
                            <td class="col-md-auto">
                            <a href="<?= base_url('clientes/delete/'.$key->idCliente); ?>" class="btn btn-danger">Borrar</a>
                            <a href=""></a>
                            <a href="<?= base_url('clientes/edit/'.$key->idCliente); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
