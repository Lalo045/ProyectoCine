<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Cliente</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('clientes/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" 
                    class="form-control" id="nombre" required
                    placeholder="Nombre" value="<?= set_value('nombre') ?>" >
                </div>

                <div class="mb-3">
                    <label for="apellidoP" class="form-label">Apellido Paterno</label>
                    <input name="apellidoP" type="text" 
                    class="form-control" id="apellidoP" required
                    placeholder="Apellido Paterno" value="<?= set_value('apellidoP') ?>" >
                </div>

                <div class="mb-3">
                    <label for="apellidoM" class="form-label">Apellido Materno</label>
                    <input name="apellidoM" type="text" 
                    class="form-control" id="apellidoM" required
                    placeholder="Apellido Materno" value="<?= set_value('apellidoM') ?>" >
                </div>

                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" class="form-control" id="sexo" required>
                        <option value="M" <?= set_select('sexo', 'M') ?>>Masculino</option>
                        <option value="F" <?= set_select('sexo', 'F') ?>>Femenino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input name="fechaNacimiento" type="date" 
                    class="form-control" id="fechaNacimiento" required
                    value="<?= set_value('fechaNacimiento') ?>" >
                </div>

                <input type="submit" class="btn btn-success" value="Agregar Cliente">
            </form>
        </div>
    </div>
</div>
