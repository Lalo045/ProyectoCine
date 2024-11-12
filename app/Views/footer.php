<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    const { createApp } = Vue;
    createApp({
        data() {
            return {
                precioSeleccionado: 0,
                cantidadAsientos: 0,
                asientosSeleccionados: [],
                sala: '',
                asientosData: <?php echo isset($asientosD) ? json_encode($asientosD) : '[]'; ?>,
            }
        },
        mounted() {
            console.log("Vue se ha montado correctamente.");  // Con este console.log se puede verificar que Vue se ha montado
            console.log("Asientos cargados:", this.asientosData);
            console.log("AsientosSeleccionados almacenados", this.asientosSeleccionados);
            console.log("Precio entrada", this.precioSeleccionado);
        },
        computed: {
            total() {
                totalfinal = this.cantidadAsientos * this.precioSeleccionado;
                return totalfinal;
            },
            cantidadAsientosDisponibles() {
                // Aqui se calcula los asientos disponibles en la sala que se a seleccionado
                if (!this.sala) return 1;  // El valor por defecto si no hay sala seleccionada
                return this.asientosData.filter(asiento => 
                    asiento.idSala === this.sala && asiento.estado === 'disponible'
                ).length;
            },
            asientosFiltrados() {
                return this.asientosData.filter(asiento => {
                    return asiento.idSala === this.sala && asiento.estado !== 'vendido';
                });
            }
        },
        watch: {
            sala(newVal) {
                console.log("Valor de la sala:", newVal); // Con este console.log se puede ver se
                // se a pasado el valor de la seleccion de la funcion a el valor de "sala"
            }
        }

    }).mount('#app')

</script>





</body>



</html>



<!-- Footer 
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Sobre Nosotros</h5>
                <p>Somos un cine que ofrece la mejor experiencia cinematográfica en la ciudad. Con salas modernas, sonido envolvente y una amplia selección de películas, garantizamos una experiencia inolvidable para toda la familia.</p>
            </div>
            <div class="col-md-4">
                <h5>Contacto</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-house-door"></i> Dirección: Calle Ficticia 123, Ciudad</li>
                    <li><i class="bi bi-telephone"></i> Teléfono: (123) 456-7890</li>
                    <li><i class="bi bi-envelope"></i> Email: contacto@cineficticio.com</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Horarios de Atención</h5>
                <ul class="list-unstyled">
                    <li>Lunes - Viernes: 10:00 AM - 10:00 PM</li>
                    <li>Sábado - Domingo: 12:00 PM - 12:00 AM</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center py-2">
        <p>&copy; 2024 Cine Ficticio. Todos los derechos reservados.</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</footer>
 End Footer -->