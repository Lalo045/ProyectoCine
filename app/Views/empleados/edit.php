<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Empleado</h2>
            <form action="<?= base_url('empleados/update/'); ?>" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" value="<?= $empleado[0]->nombre; ?>"
                           class="form-control" id="nombre" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="apellidoP" class="form-label">Apellido Paterno</label>
                    <input name="apellidoP" type="text" value="<?= $empleado[0]->apellidoP; ?>"
                           class="form-control" id="apellidoP" placeholder="Apellido Paterno">
                </div>

                <div class="mb-3">
                    <label for="apellidoM" class="form-label">Apellido Materno</label>
                    <input name="apellidoM" type="text" value="<?= $empleado[0]->apellidoM; ?>"
                           class="form-control" id="apellidoM" placeholder="Apellido Materno">
                </div>

                <div class="mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="sexo" class="form-control" id="sexo">
                        <option value="M" <?= set_select('sexo', 'M', $empleado[0]->sexo == 'M'); ?>>Masculino</option>
                        <option value="F" <?= set_select('sexo', 'F', $empleado[0]->sexo == 'F'); ?>>Femenino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input name="fechaNacimiento" type="date" value="<?= $empleado[0]->fechaNacimiento; ?>"
                           class="form-control" id="fechaNacimiento">
                </div>

                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC</label>
                    <input name="rfc" type="text" value="<?= $empleado[0]->rfc; ?>"
                           class="form-control" id="rfc" placeholder="RFC">
                </div>

                <div class="mb-3">
                    <label for="noTelefono" class="form-label">Número de Teléfono</label>
                    <input name="noTelefono" type="text" value="<?= $empleado[0]->noTelefono; ?>"
                           class="form-control" id="noTelefono" placeholder="Número de Teléfono">
                </div>

                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input name="direccion" type="text" value="<?= $empleado[0]->direccion; ?>"
                           class="form-control" id="direccion" placeholder="Dirección">
                </div>

                <div class="mb-3">
                    <label for="puesto" class="form-label">Puesto</label>
                    <input name="puesto" type="text" value="<?= $empleado[0]->puesto; ?>"
                           class="form-control" id="puesto" placeholder="Puesto">
                </div>

                <div class="mb-3">
                    <label for="fechaContratacion" class="form-label">Fecha de Contratación</label>
                    <input name="fechaContratacion" type="date" value="<?= $empleado[0]->fechaContratacion; ?>"
                           class="form-control" id="fechaContratacion">
                </div>

                <div class="mb-3">
                    <label for="salario" class="form-label">Salario</label>
                    <input name="salario" type="number" value="<?= $empleado[0]->salario; ?>"
                           class="form-control" id="salario" placeholder="Salario">
                </div>

                <div class="mb-3">
                    <label for="turno" class="form-label">Turno</label>
                    <select name="turno" class="form-control" id="turno">
                        <option value="Matutino" <?= set_select('turno', 'Matutino', $empleado[0]->turno == 'Matutino'); ?>>Matutino</option>
                        <option value="Vespertino" <?= set_select('turno', 'Vespertino', $empleado[0]->turno == 'Vespertino'); ?>>Vespertino</option>
                        <option value="Nocturno" <?= set_select('turno', 'Nocturno', $empleado[0]->turno == 'Nocturno'); ?>>Nocturno</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                    <input name="correoElectronico" type="email" value="<?= $empleado[0]->correoElectronico; ?>"
                           class="form-control" id="correoElectronico" placeholder="Correo Electrónico">
                </div>

                <input type="hidden" name="idEmpleado" value="<?= $empleado[0]->idEmpleado; ?>" >
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
