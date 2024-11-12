<!-- modificar_reserva.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Reserva</title>
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

        input, select {
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
    </style>
</head>
<body>
    <header>
        <h1>Modificar Reserva - <?= htmlspecialchars($reserva['localizador']) ?></h1>
    </header>

    <form action="/reserva/modificar" method="POST">
        <input type="hidden" name="id_reserva" value="<?= htmlspecialchars($reserva['id_reserva']) ?>">

        <label for="fecha_entrada">Fecha de Entrada:</label>
        <input type="date" id="fecha_entrada" name="fecha_entrada" value="<?= htmlspecialchars($reserva['fecha_entrada']) ?>" required>

        <label for="hora_entrada">Hora de Entrada:</label>
        <input type="time" id="hora_entrada" name="hora_entrada" value="<?= htmlspecialchars($reserva['hora_entrada']) ?>">

        <label for="origen_vuelo_entrada">Origen del Vuelo:</label>
        <input type="text" id="origen_vuelo_entrada" name="origen_vuelo_entrada" value="<?= htmlspecialchars($reserva['origen_vuelo_entrada']) ?>">

        <label for="fecha_vuelo_salida">Fecha de Vuelo de Salida:</label>
        <input type="date" id="fecha_vuelo_salida" name="fecha_vuelo_salida" value="<?= htmlspecialchars($reserva['fecha_vuelo_salida']) ?>">

        <label for="hora_vuelo_salida">Hora del Vuelo de Salida:</label>
        <input type="time" id="hora_vuelo_salida" name="hora_vuelo_salida" value="<?= htmlspecialchars($reserva['hora_vuelo_salida']) ?>">

        <label for="hora_recogida">Hora de Recogida:</label>
        <input type="time" id="hora_recogida" name="hora_recogida" value="<?= htmlspecialchars($reserva['hora_recogida']) ?>">

        <label for="num_viajeros">Número de Viajeros:</label>
        <input type="number" id="num_viajeros" name="num_viajeros" value="<?= htmlspecialchars($reserva['num_viajeros']) ?>" required>

        <label for="id_vehiculo">Número Vehículo:</label>
        <input type="number" id="id_vehiculo" name="id_vehiculo" value="<?= htmlspecialchars($reserva['id_vehiculo']) ?>" required>

        <button type="submit">Guardar Cambios</button>
    </form>

    <div class="volver-menu">
        <a href="/cliente/home">
            <button>Volver al Menú del Usuario</button>
        </a>
    </div>
</body>
</html>
