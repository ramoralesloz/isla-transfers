<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reserva - Cliente Particular</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'monsterrat', sans-serif;
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

        #aeropuerto_hotel_fields,
        #hotel_aeropuerto_fields {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Crear Nueva Reserva - Cliente Particular</h1>
    </header>

    <form action="/reserva/crear" method="POST">
        <label for="email_cliente">Correo Electrónico del Cliente:</label>
        <input type="email" id="email_cliente" name="email_cliente" required>

        <label for="tipo_trayecto">Tipo de Trayecto:</label>
        <select id="tipo_trayecto" name="id_tipo_reserva" required>
            <option value="1">Aeropuerto a Hotel</option>
            <option value="2">Hotel a Aeropuerto</option>
            <option value="3">Ida y Vuelta</option>
        </select>

        <!-- Campos para el trayecto de aeropuerto a hotel -->
        <div id="aeropuerto_hotel_fields">
            <label for="fecha_entrada">Fecha de Llegada:</label>
            <input type="date" id="fecha_entrada" name="fecha_entrada">

            <label for="hora_entrada">Hora de Llegada:</label>
            <input type="time" id="hora_entrada" name="hora_entrada">

            <label for="numero_vuelo">Número de Vuelo:</label>
            <input type="text" id="numero_vuelo" name="numero_vuelo">

            <label for="origen_vuelo_entrada">Origen del Vuelo:</label>
            <input type="text" id="origen_vuelo_entrada" name="origen_vuelo_entrada">
            
        </div>

        <!-- Campos para el trayecto de hotel a aeropuerto -->
        <div id="hotel_aeropuerto_fields">
            <label for="fecha_salida">Fecha del Vuelo:</label>
            <input type="date" id="fecha_salida" name="fecha_vuelo_salida">

            <label for="hora_salida">Hora del Vuelo:</label>
            <input type="time" id="hora_salida" name="hora_vuelo_salida">

            <label for="numero_vuelo_salida">Número de Vuelo de Salida:</label>
            <input type="text" id="numero_vuelo_salida" name="numero_vuelo_salida">

            <label for="hora_recogida">Hora de Recogida en el Hotel:</label>
            <input type="time" id="hora_recogida" name="hora_recogida">
        </div>

        <!-- Campos comunes -->
        <label for="id_hotel">Hotel de Destino/Recogida:</label>
        <input type="number" id="id_hotel" name="id_hotel" required>

        <label for="id_destino">Destino (ID del hotel):</label>
        <input type="number" id="id_destino" name="id_destino" required>

        <label for="num_viajeros">Número de Viajeros:</label>
        <input type="number" id="num_viajeros" name="num_viajeros" required>

        <label for="id_vehiculo">Número Vehiculo:</label>
        <input type="number" id="id_vehiculo" name="id_vehiculo" required>
        <button type="submit">Crear Reserva</button>
    </form>
    <div class="volver-menu">
        <a href="/cliente/home">
            <button>Volver al Menú del Usuario</button>
        </a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipoTrayectoSelect = document.getElementById('tipo_trayecto');
            const aeropuertoHotelFields = document.getElementById('aeropuerto_hotel_fields');
            const hotelAeropuertoFields = document.getElementById('hotel_aeropuerto_fields');

            function toggleFields() {
                const tipoTrayecto = tipoTrayectoSelect.value;
                aeropuertoHotelFields.style.display = tipoTrayecto === '1' || tipoTrayecto === '3' ? 'block' : 'none';
                hotelAeropuertoFields.style.display = tipoTrayecto === '2' || tipoTrayecto === '3' ? 'block' : 'none';
            }

            tipoTrayectoSelect.addEventListener('change', toggleFields);
            toggleFields();
        });
    </script>
</body>
</html>

