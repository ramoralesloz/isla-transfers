¡<?php
// Configuración de la conexión a la base de datos
$servername = "db"; // El nombre del servicio del contenedor MySQL en Docker
$username = "root";
$password = "rootpassword";
$dbname = "mydatabase";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Conexión exitosa a la base de datos MySQL";

// Tu consulta SQL
$sql = "SELECT * FROM algunatabla";
$result = mysqli_query($conn, $sql);

// Manejo de resultados
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Datos: " . $row["columna"] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
mysqli_close($conn);
?>
