<div class="container">
    <div class="row">
        <div class="col">
            <h2>Administra Empleados</h2>
        </div>
        <div class="col-2">
            <a href="<?= base_url('empleados/add/'); ?> " class="btn btn-success">Agregar empleado</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-light">
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Fecha de nacimiento</th>
                        <th>RFC</th>
                        <th>Número de teléfono</th>
                        <th>Dirección</th>
                        <th>Puesto</th>
                        <th>Turno</th>
                        <th>Correo Electrónico</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach ($empleadosD as $key):
                            $fechaNacimiento = new DateTime($key->fechaNacimiento);
                            $hoy = new DateTime();
                            $edad = $hoy->diff($fechaNacimiento)->y;
                            ?>

                            <tr>
                                <td><?= $key->nombre ?>     <?= $key->apellidoP ?>     <?= $key->apellidoM ?></td>
                                <td><?= $key->sexo ?></td>
                                <td><?= $edad ?> años</td>
                                <td><?= $key->rfc ?></td>
                                <td><?= $key->noTelefono ?></td>
                                <td><?= $key->direccion ?></td>
                                <td><?= $key->puesto ?></td>
                                <td><?= $key->turno ?></td>
                                <td><?= $key->correoElectronico ?></td>
                                <td class="col-md-auto">
                                    <a href="<?= base_url('empleados/delete/' . $key->idEmpleado); ?> "
                                        class="btn btn-danger">Borrar</a>
                                    <a href="<?= base_url('empleados/edit/' . $key->idEmpleado); ?> "
                                        class="btn btn-warning">Modificar</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>