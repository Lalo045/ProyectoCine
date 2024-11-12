<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Usuario</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('cuentas/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario</label>
                    <input name="user" type="text" 
                        class="form-control" id="user" required
                        placeholder="Usuario" value="<?= set_value('user') ?>" >
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input name="pass" type="text" 
                        class="form-control" id="pass" required
                        placeholder="Password" value="<?= set_value('pass') ?>" >
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input name="tipo" type="text" 
                        class="form-control" id="tipo" required
                        placeholder="1,0" value="<?= set_value('tipo') ?>" >
                </div>

                
                <input type="submit" class="btn btn-success" value="Agregar usuario">
            </form>
        </div>
    </div>
</div>
