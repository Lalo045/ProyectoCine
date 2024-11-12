<div class="container mt-4" id="app">
    <div class="row">
        <div class="col">
            <h2>Editar Venta</h2>

            <!-- Mostrar mensajes de error de validación -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <!-- Formulario para editar la venta existente -->
            <form action="<?= base_url('ventas/update') ?>" method="post">
                <?= csrf_field() ?>

                <!-- Seleccionar cliente -->
                <div class="mb-3">
                    <label for="idCliente" class="form-label">Cliente</label>
                    <select class="form-control" name="idCliente" id="idCliente" required>
                        <option value="">Seleccione un cliente</option>
                        <?php foreach ($clientesD as $cliente): ?>
                            <option value="<?= $cliente->idCliente ?>" <?= isset($venta->idCliente) && $cliente->idCliente == $venta->idCliente ? 'selected' : '' ?>>
                                <?= $cliente->nombre . ' ' . $cliente->apellidoP ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Seleccionar empleado -->
                <div class="mb-3">
                    <label for="idEmpleado" class="form-label">Empleado</label>
                    <select class="form-control" name="idEmpleado" id="idEmpleado" required>
                        <option value="">Seleccione un empleado</option>
                        <?php foreach ($empleadosD as $empleado): ?>
                            <option value="<?= $empleado->idEmpleado ?>" <?= isset($venta->idEmpleado) && $empleado->idEmpleado == $venta->idEmpleado ? 'selected' : '' ?>>
                                <?= $empleado->nombre . ' ' . $empleado->apellidoP ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Seleccionar función -->
                <div class="mb-3">
                    <label for="idFuncion" class="form-label">Función</label>
                    <select v-model="sala" class="form-control" name="idFuncion" id="idFuncion" required>
                        <option value="">Seleccione una función</option>
                        <?php foreach ($funcionesD as $funcion): ?>
                            <option value="<?= $funcion->idSala ?>" <?= isset($venta->idFuncion) && $funcion->idFuncion == $venta->idFuncion ? 'selected' : '' ?>>
                                Sala <?= $funcion->idSala ?> - Función <?= $funcion->idFuncion ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Seleccionar tipo de asiento -->
                <div class="mb-3">
                    <label for="idprecioEntrada" class="form-label">Tipo de asiento</label>
                    <select v-model="precioSeleccionado" class="form-control" name="idprecioEntrada" id="idprecioEntrada" required>
                        <option value="">Seleccione el tipo de asiento</option>
                        <?php foreach ($precioEntradaM as $preEntra): ?>
                            <option value="<?= $preEntra->precio ?>" <?= isset($venta->precio) && $preEntra->precio == $venta->precio ? 'selected' : '' ?>>
                                Tipo de entrada: <?= $preEntra->tipoEntrada ?> - Precio: <?= $preEntra->precio ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Seleccionar cantidad de asientos -->
                <div class="mb-3">
                    <label for="cantidadAsientos" class="form-label">Cantidad de Asientos</label>
                    <input min="1" max="<?= $asientosDisponibles[0]->cantidad_disponible ?>" v-model.number="cantidadAsientos" name="cantidadAsientos" type="number" class="form-control" id="cantidadAsientos" required value="<?= isset($venta->cantidadAsientos) ? $venta->cantidadAsientos : '' ?>">
                </div>

                <!-- Precio calculado -->
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio a pagar:</label>
                    <p>{{ total }}</p>
                    <input type="hidden" name="precio" id="precio" required v-model="precio">
                </div>

                <!-- Seleccionar múltiples asientos -->
                <div class="mb-3">
                    <label class="form-label">Seleccione los asientos</label>
                    <div v-for="asiento in asientosFiltrados" :key="asiento.idAsiento" class="form-check">
                        <input class="form-check-input" type="checkbox" v-model="asientosSeleccionados" :value="asiento.idAsiento" :disabled="asientosSeleccionados.length >= cantidadAsientos && !asientosSeleccionados.includes(asiento.idAsiento)" :id="'asiento' + asiento.idAsiento">
                        <label class="form-check-label" :for="'asiento' + asiento.idAsiento">Asiento No: {{ asiento.numeroAsiento }} - {{ asiento.estado }}</label>
                    </div>
                    <p>Asientos seleccionados: {{ asientosSeleccionados.length }} / {{ cantidadAsientos }}</p>
                </div>

                <input type="hidden" name="idAsiento" :value="asientosSeleccionados.join(',')" />

                <button type="submit" class="btn btn-success" :disabled="asientosSeleccionados.length != cantidadAsientos">Actualizar Venta</button>
            </form>
        </div>
    </div>
</div>
