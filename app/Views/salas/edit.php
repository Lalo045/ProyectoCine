<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar sala</h2>
            <form action="<?= base_url('salas/update'); ?>" method="POST">
                <div class="mb-3">
                    <label for="numeroSala" class="form-label">Numero</label>
                    <input name="numeroSala" type="text" value="<?= $sala[0]->numeroSala; ?>"
                           class="form-control" id="numeroSala" placeholder="numeroSala">
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input name="tipo" type="text" value="<?= $sala[0]->tipo; ?>"
                           class="form-control" id="tipo" placeholder="tipo">
                </div>

                <div class="mb-3">
                    <label for="cantidadAsientos" class="form-label">Cantidad de asientos</label>
                    <textarea name="cantidadAsientos" type = "number" class="form-control" id="cantidadAsientos" placeholder="cantidadAsientos"><?= $sala[0]->cantidadAsientos; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="noSalidas" class="form-label">Numero de salidas</label>
                    <input name="noSalidas" type="number" value="<?= $sala[0]->noSalidas; ?>"
                           class="form-control" id="noSalidas" placeholder="noSalidas">
                </div>

                <div class="mb-3">
                    <label for="tamaño" class="form-label">Tamaño</label>
                    <input name="tamaño" type="text" value="<?= $sala[0]->tamaño; ?>"
                           class="form-control" id="tamaño" placeholder="tamaño">
                </div>

                  <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input name="descripcion" type="text" value="<?= $sala[0]->descripcion	; ?>"
                           class="form-control" id="descripcion" placeholder="descripcion">
                </div>

                <input type="hidden" name="idSala" value="<?= $sala[0]->idSala; ?>" >
                <input type="submit" class="btn btn-success" value="Modificar">
      
                </form>
            </div>
        </div>
    </div>