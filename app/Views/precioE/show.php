<div class= "conteiner">
    <div class= "row">
        <div class="col">
            <h2>Administrar precios</h2>
        </div>
        <div class= "col-2">
        <a href="<?= base_url('precioEntrada/add/'); ?>" class="btn btn-success">Agregar precio</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>IdPrecio</th>
                    <th>Tipo entrada</th>
                    <th>precio</th>
                    <th>descripcion</th>
                    <th>Accion</th>
                </thead>
                <tbody>
                    <?php foreach($precioED as $key) : ?>
                        <tr>
                            <td><?= $key->idPrecioEntrada?></td>
                            <td><?= $key->tipoEntrada?></td>
                            <td><?= $key->precio?></td>
                            <td><?= $key->descripcion?></td>
                            <td>
                                 <a href="<?= base_url('precioEntrada/delete/'.$key->idPrecioEntrada); ?>" class="btn btn-danger">Borrar</a>
                                 <a href="<?= base_url('precioEntrada/edit/'.$key->idPrecioEntrada); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                </tbody>
            </table>

        </div>

    </div>
    </div>


