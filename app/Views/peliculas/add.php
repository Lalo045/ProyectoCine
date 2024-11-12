<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Película</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('peliculas/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" class="form-control" id="nombre" required placeholder="Nombre"
                        value="<?= set_value('nombre') ?>">
                </div>

                <div class="mb-3">
                    <label for="duracion" class="form-label">Duración</label>
                    <input name="duracion" type="text" class="form-control" id="duracion" required
                        placeholder="Duración" value="<?= set_value('duracion') ?>">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" required
                        placeholder="Descripción"><?= set_value('descripcion') ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="clasificacion" class="form-label">Clasificación</label>
                    <input name="clasificacion" type="text" class="form-control" id="clasificacion" required
                        placeholder="Clasificación" value="<?= set_value('clasificacion') ?>">
                </div>

                <input type="submit" class="btn btn-success" value="Agregar Película">
            </form>
        </div>
    </div>
</div>