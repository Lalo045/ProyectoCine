<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Función</h2>
            <form action="<?= base_url('funciones/update'); ?>" method="POST">
                
             
                <div class="mb-3">
                    <label for="idPelicula" class="form-label">Película</label>
                    <select name="idPelicula" class="form-control" id="idPelicula" required>
                        <option value="">Seleccione una película</option>
                        <?php foreach ($peliculasD as $pelicula): ?>
                            <option value="<?= $pelicula->idPelicula; ?>" <?= $funcion[0]->idPelicula == $pelicula->idPelicula ? 'selected' : '' ?>>
                                <?= $pelicula->nombre; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

            
                <div class="mb-3">
                    <label for="idSala" class="form-label">Sala</label>
                    <select name="idSala" class="form-control" id="idSala" required>
                        <option value="">Seleccione una sala</option>
                        <?php foreach ($salasD as $sala): ?>
                            <option value="<?= $sala->idSala; ?>" <?= $funcion[0]->idSala == $sala->idSala ? 'selected' : '' ?>>
                                <?= $sala->numeroSala; ?> - <?= $sala->tipo; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

              
                <div class="mb-3">
                    <label for="formato" class="form-label">Formato</label>
                    <input name="formato" type="text" value="<?= $funcion[0]->formato; ?>"
                           class="form-control" id="formato" placeholder="Formato" required>
                </div>

        
                <div class="mb-3">
                    <label for="horario" class="form-label">Horario</label>
                    <select name="horario" class="form-control" id="horario" required>
                        <option value="">Seleccione un horario</option>
                        <option value="10:00" <?= $funcion[0]->horario == "10:00" ? 'selected' : '' ?>>10:00 AM</option>
                        <option value="12:00" <?= $funcion[0]->horario == "12:00" ? 'selected' : '' ?>>12:00 PM</option>
                        <option value="14:00" <?= $funcion[0]->horario == "14:00" ? 'selected' : '' ?>>02:00 PM</option>
                        <option value="16:00" <?= $funcion[0]->horario == "16:00" ? 'selected' : '' ?>>04:00 PM</option>
                        <option value="18:00" <?= $funcion[0]->horario == "18:00" ? 'selected' : '' ?>>06:00 PM</option>
                        <option value="20:00" <?= $funcion[0]->horario == "20:00" ? 'selected' : '' ?>>08:00 PM</option>
                        <option value="22:00" <?= $funcion[0]->horario == "22:00" ? 'selected' : '' ?>>10:00 PM</option>
                    </select>
                </div>

               
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input name="fecha" type="date" value="<?= $funcion[0]->fecha; ?>"
                           class="form-control" id="fecha" required>
                </div>

                <input type="hidden" name="idFuncion" value="<?= $funcion[0]->idFuncion; ?>" >
                <input type="submit" class="btn btn-success" value="Modificar">
            </form>
        </div>
    </div>
</div>
