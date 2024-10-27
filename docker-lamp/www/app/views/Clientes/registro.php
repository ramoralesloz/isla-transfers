<?php
// Registrar cliente - registro.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
</head>
<body>
    <h1>Registrar Nuevo Cliente</h1>
    <form action="/cliente/registrar" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br>

        <label for="tipo_cliente">Tipo de Cliente:</label>
        <select id="tipo_cliente" name="tipo_cliente">
            <option value="particular">Particular</option>
            <option value="corporativo">Corporativo</option>
        </select><br>

        <button type="submit">Registrar Cliente</button>
    </form>
</body>
</html>