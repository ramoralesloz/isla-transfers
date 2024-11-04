<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Reservas</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'montserrat', sans-serif;
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

        .reservas {
            background-color: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 2em auto;
            text-align: left;
        }

        .reserva {
            background-color: #f9f9f9;
            padding: 1em;
            border-radius: 5px;
            margin-bottom: 1em;
            border: 1px solid #ccc;
        }

        .reserva p {
            margin: 0.5em 0;
        }

        .reserva h3 {
            color: #007bff;
            margin-bottom: 0.5em;
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

        button[disabled] {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .volver-menu {
            margin-top: 2em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lista de Reservas</h1>
    </header>

    <div class="reservas">
        <?php if (!empty($reservas) && is_array($reservas)): ?>
            <?php foreach ($reservas as $reserva): ?>
                <div class="reserva">
                    <h3>Reserva: <?= htmlspecialchars($reserva['localizador']) ?></h3>
                    <p><strong>Hotel:</strong> <?= htmlspecialchars($reserva['id_hotel']) ?></p>
                    <p><strong>Fecha de Reserva:</strong> <?= htmlspecialchars($reserva['fecha_reserva']) ?></p>
                    <p><strong>Fecha de Entrada:</strong> <?= htmlspecialchars($reserva['fecha_entrada']) ?> <?= htmlspecialchars($reserva['hora_entrada']) ?></p>

                    <!-- Botón de Cancelar con verificación de 48 horas -->
                    <?php if ($reserva['cancelable']): ?>
                        <a href="/reserva/eliminar?id=<?= urlencode($reserva['id_reserva']) ?>">
                            <button>Cancelar Reserva</button>
                        </a>
                        <a href="/reserva/modificar?id=<?= urlencode($reserva['id_reserva']) ?>">
                            <button>Modificar Reserva</button>
                        </a>
                    <?php else: ?>
                        <button disabled>Cancelar no disponible (menos de 48 horas)</button>
                        <button disabled>Modificar no disponible (menos de 48 horas)</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay reservas disponibles.</p>
        <?php endif; ?>
    </div>

    <div class="volver-menu">
        <a href="/cliente/home">
            <button>Volver al Menú del Usuario</button>
        </a>
    </div>
</body>
</html>
