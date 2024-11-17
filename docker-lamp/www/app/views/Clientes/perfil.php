<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Cliente</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
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

        form {
            background-color: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 2em auto;
            text-align: left;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 0.5em;
            margin: 0.5em 0 1.5em 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 1em;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Perfil del Cliente</h1>
    </header>

    <div class="container">
        <p><strong>Nombre:</strong> <?= htmlspecialchars($cliente['nombre']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($cliente['email']); ?></p>

        <h2>Modificar Datos</h2>
        <form action="<?php echo BASE_URI; ?>/cliente/modificar" method="POST">
            <!-- Campo oculto para el ID del cliente -->
            <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente['id_viajero']); ?>">

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($cliente['nombre']); ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']); ?>" required>

            <label for="password">Password (dejar en blanco para no cambiar)</label>
            <input type="password" id="password" name="password">

            <button type="submit">Actualizar Datos</button>
        </form>
    </div>
    <div class="volver-menu">
        <a href="<?php echo BASE_URI; ?>/cliente/home">
            <button>Volver al Menú del Usuario</button>
        </a>
    </div>
</body>
</html>
