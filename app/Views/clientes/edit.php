<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Cliente</h2>
            <form action="<?= base_url('clientes/update/'); ?>" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" value="<?= $cliente[0]->nombre; ?>"
                           class="form-control" id="nombre" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="apellidoP" class="form-label">Apellido Paterno</label>
                    <input name="apellidoP" type="text" value="<?= $cliente[0]->apellidoP; ?>"
                           class="form-control" id="apellidoP" placeholder="Apellido Paterno">
                </div>

                <div class="mb-3">
                    <label for="apellidoM" class="form-label">Apellido Materno</label>
                    <input name="apellidoM" type="text" value="<?= $cliente[0]->apellidoM; ?>"
                           class="form-control" id="apellidoM" placeholder="Apellido Materno">
                </div>

                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" class="form-control" id="sexo">
                        <option value="M" <?= set_select('sexo', 'M', $cliente[0]->sexo == 'M'); ?>>Masculino</option>
                        <option value="F" <?= set_select('sexo', 'F', $cliente[0]->sexo == 'F'); ?>>Femenino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input name="fechaNacimiento" type="date" value="<?= $cliente[0]->fechaNacimiento; ?>"
                           class="form-control" id="fechaNacimiento">
                </div>

                <input type="hidden" name="idCliente" value="<?= $cliente[0]->idCliente; ?>" >
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
