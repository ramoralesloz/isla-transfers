<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f5f5;
            padding: 2em;
            text-align: center;
        }

        .registro-container {
            background-color: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
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
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Registro de Nuevo Cliente</h1>
    </header>

    <div class="registro-container">
        <form action="/cliente/registrar" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido1">Primer Apellido:</label>
            <input type="text" id="apellido1" name="apellido1" required>

            <label for="apellido2">Segundo Apellido:</label>
            <input type="text" id="apellido2" name="apellido2" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="codigoPostal">Código Postal:</label>
            <input type="text" id="codigoPostal" name="codigoPostal" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" required>

            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrar Cliente</button>
        </form>
    </div>
</body>
</html>
