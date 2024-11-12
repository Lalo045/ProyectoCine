<div class="container mt-4">
    <div id="app">

        <h2>Añadir venta</h2>

        <!-- Mostrar mensajes de error de validación -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para añadir una nueva venta -->
        <form action="<?= base_url('ventas/insert') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Seleccionar cliente (Se va a quitar) -->
            <div class="form-group">
                <label for="idCliente">Cliente</label>
                <select class="form-control" name="idCliente" id="idCliente" required>
                    <option value="">Seleccione un cliente</option>
                    <?php foreach ($clientesD as $cliente): ?>
                        <option value="<?= $cliente->idCliente ?>"><?= $cliente->nombre . ' ' . $cliente->apellidoP ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Seleccionar empleado -->
            <div class="form-group">
                <label for="idEmpleado">Empleado</label>
                <select class="form-control" name="idEmpleado" id="idEmpleado" required>
                    <option value="">Seleccione un empleado</option>
                    <?php foreach ($empleadosD as $empleado): ?>
                        <option value="<?= $empleado->idEmpleado ?>"><?= $empleado->nombre . ' ' . $empleado->apellidoP ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Seleccionar función -->
            <div class="form-group">
                <label for="idFuncion">Función</label>
                <select v-model="sala" class="form-control" name="idFuncion" id="idFuncion" required>
                    <option value="">Seleccione una función</option>

                    <?php foreach ($funcionesD as $funcion): ?>
                        <!-- Aqui se esta pasando a la base de datos el idSala en lugar del idFuncion en el value-->
                        <option value="<?= $funcion->idSala ?>"> Sala <?= $funcion->idSala ?> - Función
                            <?= $funcion->idFuncion ?></option>

                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Seleccionar el tipo de asiento (Para hacer la multiplicación) -->
            <div class="form-group">
                <label for="idPrecioEntrada">Tipo de asiento</label>
                <select v-model="precioSeleccionado" class="form-control" name="idPrecioEntrada" id="idPrecioEntrada"
                    required>
                    <option value="">Seleccione el tipo de asiento</option>
                    <?php foreach ($precioEntrada as $preEntra): ?>
                        <option value="<?= $preEntra->precio ?>">Tipo de entrada: <?= $preEntra->tipoEntrada ?> - Precio:
                            <?= $preEntra->precio ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Seleccionar la cantidad de asientos -->
     

                <div class="form-group">
                    <label for="cantidadAsientos">Cantidad de Asientos</label>
                    <input min="1" :max="cantidadAsientosDisponibles" v-model.number="cantidadAsientos"
                        name="cantidadAsientos" type="number" class="form-control" id="cantidadAsientos" required
                        placeholder="Ingrese la cantidad de asientos a comprar">
                </div>
       
            <!-- Para mostrar el total calculado -->
            <div class="form-group">
                <label for="total" class="form-label">Total a pagar:</label>
                <p>{{ total }}</p>
                <input type="hidden" name="total" id="total" required placeholder="Total" v-model="total">
            </div>



            <!-- Seleccionar múltiples Asientos -->
            <div class="form-group">
                <label>Seleccione los asientos</label>
                <div v-for="asiento in asientosFiltrados" :key="asiento.idAsiento" class="form-check">
                    <input class="form-check-input" type="checkbox" v-model="asientosSeleccionados"
                        :value="asiento.idAsiento"
                        :disabled="asientosSeleccionados.length >= cantidadAsientos && !asientosSeleccionados.includes(asiento.idAsiento)"
                        :id="'asiento' + asiento.idAsiento">

                    <label class="form-check-label" :for="'asiento' + asiento.idAsiento">
                        Asiento No: {{ asiento.numeroAsiento }} - {{ asiento.estado }}
                    </label>
                </div>
                <p>Asientos seleccionados: {{ asientosSeleccionados.length }} / {{ cantidadAsientos }}</p>
            </div>

            <input type="hidden" name="idAsiento" :value="asientosSeleccionados.join(',')" />


            <button type="submit" class="btn btn-primary"
                :disabled="asientosSeleccionados.length != cantidadAsientos">Añadir Venta</button>
        </form>
    </div>
</div>