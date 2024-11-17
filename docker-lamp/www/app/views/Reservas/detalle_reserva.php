<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de la Reserva</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f5f5;
            padding: 2em;
            text-align: center;
        }

        .detalle-reserva {
            background-color: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
        }

        h1 {
            margin-bottom: 1em;
        }

        footer {
            text-align: center;
            padding: 2em;
            background-color: #007bff;
            color: #fff;
            margin-top: 2em;
        }

        .volver-menu {
            margin-top: 2em;
        }

        .volver-menu a {
            display: inline-block;
            padding: 1em 2em;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .volver-menu a:hover {
            background-color: #0056b3;
        }

        .acciones {
            margin-top: 2em;
            display: flex;
            justify-content: center;
            gap: 1em;
        }

        .acciones a {
            display: inline-block;
            padding: 1em 2em;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .acciones a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Detalle de la Reserva</h1>
    </header>
    <div class="detalle-reserva">
        <p><strong>Localizador:</strong> <?= htmlspecialchars($reserva['localizador']) ?></p>
        <p><strong>Hotel:</strong> <?= htmlspecialchars($reserva['id_hotel']) ?></p>
        <p><strong>Tipo de Reserva:</strong> <?= htmlspecialchars($reserva['id_tipo_reserva']) ?></p>
        <p><strong>Email Cliente:</strong> <?= htmlspecialchars($reserva['email_cliente']) ?></p>
        <p><strong>Fecha de Reserva:</strong> <?= htmlspecialchars($reserva['fecha_reserva']) ?></p>
        <p><strong>Fecha de Modificación:</strong> <?= htmlspecialchars($reserva['fecha_modificacion']) ?></p>
        <p><strong>Destino:</strong> <?= htmlspecialchars($reserva['id_destino']) ?></p>
        <p><strong>Fecha de Entrada:</strong> <?= htmlspecialchars($reserva['fecha_entrada']) ?></p>
        <p><strong>Hora de Entrada:</strong> <?= htmlspecialchars($reserva['hora_entrada']) ?></p>
        <p><strong>Origen del Vuelo:</strong> <?= htmlspecialchars($reserva['origen_vuelo_entrada']) ?></p>
        <p><strong>Número de Vuelo:</strong> <?= htmlspecialchars($reserva['numero_vuelo']) ?></p>
        <p><strong>Fecha de Vuelo de Salida:</strong> <?= htmlspecialchars($reserva['fecha_vuelo_salida']) ?></p>
        <p><strong>Hora del Vuelo de Salida:</strong> <?= htmlspecialchars($reserva['hora_vuelo_salida']) ?></p>
        <p><strong>Hora de Recogida:</strong> <?= htmlspecialchars($reserva['hora_recogida']) ?></p>
        <p><strong>Número de Viajeros:</strong> <?= htmlspecialchars($reserva['num_viajeros']) ?></p>
        <p><strong>Vehículo:</strong> <?= htmlspecialchars($reserva['id_vehiculo']) ?></p>
    </div>

    <div class="acciones">
        <a href="<?php echo BASE_URI; ?>/reserva/modificar?id=<?= urlencode($reserva['id_reserva']) ?>">Modificar Reserva</a>
        <a href="<?php echo BASE_URI; ?>/reserva/calendario">Volver al Calendario</a>
    </div>

    <footer>
        <p>Isla Transfers 2024</p>
    </footer>
</body>
</html>
