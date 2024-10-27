<?php
// Registrar cliente corporativo - registro_hotel.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Hotel</title>
</head>
<body>
    <h1>Registrar Nuevo Hotel</h1>
    <form action="/hotel/registrar" method="POST">
        <label for="nombre">Nombre del Hotel:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="id_zona">ID de Zona:</label>
        <input type="text" id="id_zona" name="id_zona" required><br>

        <label for="comision">Comisión (%):</label>
        <input type="number" id="comision" name="comision" required><br>

        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Registrar Hotel</button>
    </form>
</body>
</html>
