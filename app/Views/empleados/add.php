<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Empleado</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('empleados/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" class="form-control" id="nombre" required placeholder="Nombre"
                        value="<?= set_value('nombre') ?>">
                </div>

                <div class="mb-3">
                    <label for="apellidoP" class="form-label">Apellido Paterno</label>
                    <input name="apellidoP" type="text" class="form-control" id="apellidoP" required
                        placeholder="Apellido Paterno" value="<?= set_value('apellidoP') ?>">
                </div>

                <div class="mb-3">
                    <label for="apellidoM" class="form-label">Apellido Materno</label>
                    <input name="apellidoM" type="text" class="form-control" id="apellidoM" required
                        placeholder="Apellido Materno" value="<?= set_value('apellidoM') ?>">
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
                    <input name="fechaNacimiento" type="date" class="form-control" id="fechaNacimiento" required
                        value="<?= set_value('fechaNacimiento') ?>">
                </div>

                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC</label>
                    <input name="rfc" type="text" class="form-control" id="rfc" required placeholder="RFC"
                        value="<?= set_value('rfc') ?>">
                </div>

                <div class="mb-3">
                    <label for="noTelefono" class="form-label">Número de Teléfono</label>
                    <input name="noTelefono" type="text" class="form-control" id="noTelefono" required
                        placeholder="Número de Teléfono" value="<?= set_value('noTelefono') ?>">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input name="direccion" type="text" class="form-control" id="direccion" required
                        placeholder="Dirección" value="<?= set_value('direccion') ?>">
                </div>

                <div class="mb-3">
                    <label for="puesto" class="form-label">Puesto</label>
                    <select name="puesto" class="form-control" id="puesto" required>
                        <option value="Gerente" <?= set_select('puesto', 'Gerente') ?>>Gerente</option>
                        <option value="Taquillero" <?= set_select('puesto', 'Taquillero') ?>>Taquillero</option>
                        <option value="Vendedor de dulces" <?= set_select('puesto', 'Vendedor de dulces') ?>>Vendedor de
                            dulces</option>
                        <option value="Personal de limpieza" <?= set_select('puesto', 'Personal de limpieza') ?>>Personal
                            de limpieza</option>
                        <option value="Proyeccionista" <?= set_select('puesto', 'Proyeccionista') ?>>Proyeccionista
                        </option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="fechaContratacion" class="form-label">Fecha de Contratación</label>
                    <input name="fechaContratacion" type="date" class="form-control" id="fechaContratacion" required
                        value="<?= set_value('fechaContratacion') ?>">
                </div>

                <div class="mb-3">
                    <label for="salario" class="form-label">Salario</label>
                    <input name="salario" type="number" class="form-control" id="salario" required placeholder="Salario"
                        value="<?= set_value('salario') ?>">
                </div>

                <div class="mb-3">
                    <label for="turno" class="form-label">Turno</label>
                    <select name="turno" class="form-control" id="turno" required>
                        <option value="Matutino" <?= set_select('turno', 'Matutino') ?>>Matutino</option>
                        <option value="Vespertino" <?= set_select('turno', 'Vespertino') ?>>Vespertino</option>
                        <option value="Nocturno" <?= set_select('turno', 'Nocturno') ?>>Nocturno</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                    <input name="correoElectronico" type="email" class="form-control" id="correoElectronico" required
                        placeholder="Correo Electrónico" value="<?= set_value('correoElectronico') ?>">
                </div>

                <input type="submit" class="btn btn-success" value="Agregar Empleado">
            </form>
        </div>
    </div>
</div>