<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Función</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('funciones/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="idPelicula" class="form-label">Película</label>
                    <select name="idPelicula" class="form-control" id="idPelicula" required>
                        <option value="">Seleccione una película</option>

                        <?php foreach ($peliculasD as $pelicula): ?>
                            <option value="<?= $pelicula->idPelicula; ?>">
                                <?= $pelicula->nombre; ?>
                            </option>

                        <?php endforeach; ?>


                    </select>
                </div>

                <div class="mb-3">
                    <label for="idSala" class="form-label">Sala</label>
                    <select name="idSala" class="form-control" id="idSala" required>
                        <option value="">Seleccione una sala</option>
                        <?php foreach ($salasD as $sala): ?>
                            <option value="<?= $sala->idSala; ?>">
                                <?= $sala->numeroSala; ?> - <?= $sala->tipo; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">

                    <label for="formato" class="form-label">Formato</label>
                    <input name="formato" type="text" class="form-control" id="formato" required placeholder="Formato"
                        value="<?= set_value('formato') ?>">
                </div>

                <div class="mb-3">
                    <label for="horario" class="form-label">Horario</label>
                    <select name="horario" class="form-control" id="horario" required>
                        <option value="">Seleccione un horario</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="14:00">02:00 PM</option>
                        <option value="16:00">04:00 PM</option>
                        <option value="18:00">06:00 PM</option>
                        <option value="20:00">08:00 PM</option>
                        <option value="22:00">10:00 PM</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input name="fecha" type="date" class="form-control" id="fecha" required placeholder="Fecha"
                        value="<?= set_value('fecha') ?>">
                </div>

                <input type="submit" class="btn btn-success" value="Agregar función">
            </form>
        </div>
    </div>
</div>