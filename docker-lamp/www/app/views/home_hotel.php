<?php
session_start();
if (!isset($_SESSION['hotel_id']) || $_SESSION['tipo_cliente'] !== 'corporativo') {
    header('Location: /hotel/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Home</title>
</head>
<body>
    <h1>Bienvenido, Hotel Corporativo</h1>
    <ul>
        <li><a href="/reserva/crear">Crear Reserva para un Cliente</a></li>
        <li><a href="/reserva/listar">Ver Reservas del Hotel</a></li>
    </ul>
</body>
</html>
