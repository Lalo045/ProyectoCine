<?php
// Conexión a la base de datos
include 'SalaM.php'; // Incluye tu archivo de conexión a la base de datos

if (isset($_GET['idSala'])) {
    $idSala = $_GET['idSala'];

    // Consulta a la base de datos para obtener la cantidad de asientos
    $query = $conn->prepare("SELECT cantidadAsientos FROM salas WHERE idSala = ?");
    $query->bind_param("i", $idSala);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['cantidadAsientos']; // Devuelve la cantidad de asientos como respuesta
    } else {
        echo '0'; // Si no hay resultados, devolver 0
    }

    $query->close();
}
?>
