<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar precio de entrada</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('PrecioEntrada/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="tipoEntrada" class="form-label">Tipo de entrada</label>
                    <input name="tipoEntrada" type="text" class="form-control" id="tipoEntrada" required
                    placeholder="Ingrese el tipo de entrada" value="<?= set_value('tipoEntrada') ?>" >
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="number" step="0.01" class="form-control" id="precio" required
                        placeholder="Ingrese el precio de la entrada" value="<?= set_value('precio') ?>" >
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" required
                        placeholder="Descripción"><?= set_value('descripcion') ?></textarea>
                </div>

                <input type="submit" class="btn btn-success" value="Agregar Precio">
            </form>
        </div>
    </div>
</div>
