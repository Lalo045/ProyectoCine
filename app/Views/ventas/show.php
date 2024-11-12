<div class="container">
    <div class="row">
        <div class="col">
            <h2>Administrar Ventas</h2>
        </div>
        <div class="col-2">
            <a href="<?= base_url('ventas/add/'); ?>" class="btn btn-success">Agregar Venta</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-bordered" >
                <thead class="thead-light">
                    <th class="text-center">IdVenta</th>
                    <th class="text-center">idFuncion</th> 
                    <th class="text-center">idEmpleado</th>  
                    <th class="text-center">idCliente</th>
                    <th class="text-center">Cantidad de Asientos</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Fecha Venta</th>
                    <th class="text-center">Accion</th>
                </thead>
                <tbody>
                    <?php foreach($ventasD as $key) : ?>
                        <tr>
                            <td class="text-center"><?= $key->idVenta ?></td>
                            <td class="text-center"><?= $key->idFuncion ?></td>
                            <td class="text-center"><?= $key->idEmpleado?></td> 
                            <td class="text-center"><?= $key->idCliente?></td> 
                            <td class="text-center"><?= $key->cantidadAsientos?></td>
                            <td class="text-center"><?= $key->total ?></td> 
                            <td class="text-center"><?= date('d/m/Y H:i', strtotime($key->fechaVenta)) ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('ventas/delete/'.$key->idVenta); ?>" class="btn btn-danger">Borrar</a>
                               <!-- <a href="<?= base_url('ventas/edit/'.$key->idVenta); ?>" class="btn btn-warning">Modificar</a> -->
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
