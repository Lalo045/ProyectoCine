<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Película</h2>
            <form action="<?= base_url('peliculas/update'); ?>" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" value="<?= $pelicula[0]->nombre; ?>"
                           class="form-control" id="nombre" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración</label>
                    <input name="duracion" type="text" value="<?= $pelicula[0]->duracion; ?>"
                           class="form-control" id="duracion" placeholder="Duración">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripción"><?= $pelicula[0]->descripcion; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="clasificacion" class="form-label">Clasificación</label>
                    <input name="clasificacion" type="text" value="<?= $pelicula[0]->clasificacion; ?>"
                           class="form-control" id="clasificacion" placeholder="Clasificación">
                </div>

                <input type="hidden" name="idPelicula" value="<?= $pelicula[0]->idPelicula; ?>" >
                <input type="submit" class="btn btn-success" value="Modificar">
      
                </form>
            </div>
        </div>
    </div>