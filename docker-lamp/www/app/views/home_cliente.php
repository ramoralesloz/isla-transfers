<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['cliente_id']) || $_SESSION['tipo_cliente'] !== 'particular') {
    header('Location: /cliente/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente Particular - Home</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 2em;
        }
        
        header {
            background-color: #007bff;
            padding: 1.5em;
            color: #fff;
            border-radius: 10px;
        }

        .options {
            margin-top: 2em;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .options a {
            display: block;
            width: 80%;
            max-width: 300px;
            margin: 1em 0;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 1em;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .options a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo isset($_SESSION['nombre_cliente']) ? htmlspecialchars($_SESSION['nombre_cliente']) : 'Cliente'; ?></h1>
        <p>Seleccione una opción para continuar:</p>
    </header>

    <div class="options">
        <a href="/reserva/crear"><i class="fas fa-plus-circle"></i> Hacer una Reserva</a>
        <a href="/reserva/listar"><i class="fas fa-list"></i> Ver mis Reservas</a>
        <a href="/cliente/perfil"><i class="fas fa-user"></i> Mi Perfil</a>
    </div>
    
</body>
</html>
