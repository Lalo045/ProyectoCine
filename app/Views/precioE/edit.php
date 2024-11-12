<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Precio de Entrada</h2>
            <form action="<?= base_url('precioEntrada/update'); ?>" method="POST">
                
                <div class="mb-3">
                    <label for="tipoEntrada" class="form-label">Tipo de Entrada</label>
                    <input name="tipoEntrada" type="text" value="<?= $precioEntrada[0]->tipoEntrada; ?>"
                           class="form-control" id="tipoEntrada" placeholder="Tipo de Entrada">
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="number" step="0.01" value="<?= $precioEntrada[0]->precio; ?>"
                           class="form-control" id="precio" placeholder="Precio">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripción"><?= $precioEntrada[0]->descripcion; ?></textarea>
                </div>

                <input type="hidden" name="idPrecioEntrada" value="<?= $precioEntrada[0]->idPrecioEntrada; ?>" >
                <input type="submit" class="btn btn-success" value="Modificar">
      
            </form>
        </div>
    </div>
</div>
