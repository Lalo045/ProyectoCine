<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Sala</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('salas/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="numeroSala" class="form-label">Número de Sala</label>
                    <input name="numeroSala" type="number" 
                        class="form-control" id="numeroSala" required
                        placeholder="Número de Sala" value="<?= set_value('numeroSala') ?>" >
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Sala</label>
                    <input name="tipo" type="text" 
                        class="form-control" id="tipo" required
                        placeholder="Tipo de Sala" value="<?= set_value('tipo') ?>" >
                </div>

                <div class="mb-3">
                    <label for="cantidadAsientos" class="form-label">Cantidad de Asientos</label>
                    <input name="cantidadAsientos" type="number" 
                        class="form-control" id="cantidadAsientos" required
                        placeholder="Cantidad de Asientos" value="<?= set_value('cantidadAsientos') ?>" >
                </div>

                <div class="mb-3">
                    <label for="noSalidas" class="form-label">Número de Salidas</label>
                    <input name="noSalidas" type="number" 
                        class="form-control" id="noSalidas" required
                        placeholder="Número de Salidas" value="<?= set_value('noSalidas') ?>" >
                </div>

                <div class="mb-3">
                    <label for="tamaño" class="form-label">Tamaño de la Sala</label>
                    <input name="tamaño" type="text" 
                        class="form-control" id="tamaño" required
                        placeholder="Tamaño de la Sala" value="<?= set_value('tamaño') ?>" >
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" 
                        class="form-control" id="descripcion" required
                        placeholder="Descripción de la Sala"><?= set_value('descripcion') ?></textarea>
                </div>

                <input type="submit" class="btn btn-success" value="Agregar Sala">
            </form>
        </div>
    </div>
</div>
