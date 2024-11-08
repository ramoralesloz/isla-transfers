<?php
session_start();
if (!isset($_SESSION['cliente_id']) || $_SESSION['tipo_cliente'] !== 'administrador') {
    header('Location: /cliente/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Home</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 1.5em;
            text-align: center;
            border-radius: 10px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 1em;
            margin-top: 1em;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 0.5em 1em;
            background-color: #0056b3;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #003f8a;
        }

        main {
            padding: 2em;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2em;
            align-items: start;
        }

        section {
            background-color: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            font-size: 1.5em;
            margin-bottom: 1em;
            border-bottom: 2px solid #007bff;
            padding-bottom: 0.5em;
        }

        footer {
            text-align: center;
            padding: 2em;
            background-color: #007bff;
            color: #fff;
            margin-top: 2em;
        }

        .button {
            display: inline-block;
            margin-top: 1em;
            padding: 0.8em 1.5em;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, Administrador</h1>
        <nav>
            <ul>
                <li><a href="/reserva/gestionar"><i class="fas fa-tasks"></i> Gestionar Reservas</a></li>
                <li><a href="/vehiculo/listar"><i class="fas fa-car"></i> Ver Vehículos</a></li>
                <li><a href="/hotel/agregar"><i class="fas fa-hotel"></i> Agregar Nuevo Hotel</a></li>
                <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="gestionar-reservas">
            <h2>Gestionar Reservas</h2>
            <p>Desde aquí puedes gestionar todas las reservas realizadas, incluyendo su modificación y cancelación.</p>
            <a href="/reserva/gestionar" class="button"><i class="fas fa-tasks"></i> Ir a Gestionar Reservas</a>
        </section>

        <section id="ver-vehiculos">
            <h2>Ver Vehículos</h2>
            <p>Consulta y gestiona los vehículos disponibles para los transfers.</p>
            <a href="/vehiculo/listar" class="button"><i class="fas fa-car"></i> Ver Vehículos</a>
        </section>

        <section id="agregar-hotel">
            <h2>Agregar Nuevo Hotel</h2>
            <p>Agrega nuevos hoteles al sistema para que los clientes puedan reservar transfers desde o hacia ellos.</p>
            <a href="/hotel/agregar" class="button"><i class="fas fa-hotel"></i> Agregar Hotel</a>
        </section>
    </main>

    <footer>
        <p>Isla Transfers - Todos los derechos reservados &copy; 2024</p>
    </footer>
</body>
</html>

