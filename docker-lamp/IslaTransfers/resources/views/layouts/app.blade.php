<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Isla Transfers')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    @yield('styles')

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #333;
            line-height: 1.6;
        }

        header {
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: #fff;
            padding: 2em;
            text-align: center;
            border-radius: 10px;
            margin: 0 1.5em 2em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        nav {
            text-align: center;
            margin-bottom: 1.5em;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: inline-flex;
            gap: 1em;
            margin: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 0.5em 1em;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #0056b3;
            color: #f0f8ff;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2em;
            display: grid;
            grid-template-columns: 1fr;
            gap: 2em;
        }

        .content-section {
            background-color: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2em;
        }

        footer {
            text-align: center;
            padding: 2em;
            background: linear-gradient(45deg, #0056b3, #007bff);
            color: #fff;
            margin-top: 2em;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
        }

        .button {
            display: inline-block;
            margin-top: 1em;
            padding: 0.8em 1.5em;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            padding: 0.5em 1em;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header>
        <h1>@yield('header_title', 'Isla Transfers')</h1>
    </header>

    <main>
        <div class="content-section">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Isla Transfers - Todos los derechos reservados</p>
    </footer>
    
    @yield('scripts')
</body>
</html>
