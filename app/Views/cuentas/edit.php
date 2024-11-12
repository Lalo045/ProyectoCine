<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar usuario</h2>
            <form action="<?= base_url('cuentas/update'); ?>" method="POST">
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario</label>
                    <input name="user" type="text" value="<?= $cuenta[0]->user; ?>"
                           class="form-control" id="user" placeholder="usuario">
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input name="pass" type="text" value="<?= $cuenta[0]->pass; ?>"
                           class="form-control" id="pass" placeholder="pass">
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input name="tipo" type="text" value="<?= $cuenta[0]->tipo; ?>"
                           class="form-control" id="tipo" placeholder="tipo">
                </div>

                <input type="hidden" name="idUsuario" value="<?= $cuenta[0]->idUsuario; ?>" >
                <input type="submit" class="btn btn-success" value="Modificar">
      
                </form>
            </div>
        </div>
    </div>