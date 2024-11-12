<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar asiento</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('asientos/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="idSala" class="form-label">IdSala</label>
                    <select name="idSala" class="form-control"id="idSala" required>
                    <option value="">Seleccione la sala</option>
                    <?php foreach($salasD as $sala): ?>
                        <option value="<?= $sala->idSala; ?>">
                            <?=$sala->numeroSala; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="numeroAsiento" class="form-label">Numero de asiento</label>
                    <input name="numeroAsiento" type="number" step="0.01" class="form-control" id="numeroAsiento" required
                        placeholder="Ingrese el numero de asiento" value="<?= set_value('numeroAsiento')?>">
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select name="estado" class="form-control" id="estado" required>
                        <option value="">Seleccione el estado</option>
                        <option value="disponible">Disponible</option>
                        <option value="vendido">Vendido</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-success" value="Agregar asiento">
            </form>
        </div>
    </div>
</div>
