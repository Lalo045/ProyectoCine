<div class="container">
    <div class="row">
        <div class="col">
            <h2>Administrar Películas</h2>
            <a href="<?= base_url('peliculas/add/'); ?>" class="btn btn-success">Agregar Película</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>IdPelicula</th>
                    <th>Nombre</th>
                    <th>Duración</th>
                    <th>Descripción</th>
                    <th>Clasificación</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach($peliculasD as $key) : ?>
                        <tr>
                            <td><?= $key->idPelicula ?></td>
                            <td><?= $key->nombre ?></td>
                            <td><?= $key->duracion ?></td>
                            <td><?= $key->descripcion ?></td>
                            <td><?= $key->clasificacion ?></td>
                            <td>
                                <a href="<?= base_url('peliculas/delete/'.$key->idPelicula); ?>" class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('peliculas/edit/'.$key->idPelicula); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
