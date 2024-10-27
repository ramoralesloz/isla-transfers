<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isla Transfers - Bienvenido</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
        }
        
        header {
            background-color: #007bff;
            padding: 2em;
            color: #fff;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            font-size: 2.5em;
            margin: 0;
        }

        header p {
            font-size: 1.2em;
            margin-top: 0.5em;
        }

        .options {
            margin-top: 3em;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 400px;
        }

        .options a {
            display: block;
            width: 100%;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 1em;
            border-radius: 10px;
            font-weight: bold;
            margin: 1em 0;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .options a:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .options a i {
            margin-right: 0.5em;
        }

        footer {
            margin-top: auto;
            padding: 1.5em;
            background-color: #007bff;
            color: #fff;
            width: 100%;
            text-align: center;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido a Isla Transfers</h1>
        <p>Seleccione una opción para continuar:</p>
    </header>

    <div class="options">
        <h2><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</h2>
        <a href="/cliente/login"><i class="fas fa-user"></i> Iniciar sesión como Cliente o Administrador</a>

        <h2><i class="fas fa-user-plus"></i> Registro</h2>
        <a href="/cliente/registrar"><i class="fas fa-user"></i> Registrar como Cliente Particular</a>
        <a href="/hotel/registrar"><i class="fas fa-hotel"></i> Registrar como Cliente Corporativo (Hotel)</a>
    </div>

    <footer>
        <p>Isla Transfers - Todos los derechos reservados &copy; 2024</p>
    </footer>
</body>
</html>

