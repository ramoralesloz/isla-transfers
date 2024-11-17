<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Isla Transfers')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @yield('styles')

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 1.5em;
            text-align: center;
            border-radius: 10px;
            margin: 0 1.5em 2em;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
            text-transform: uppercase;
        }

        nav {
            text-align: center;
            margin-bottom: 1em;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: inline-flex;
            gap: 1em;
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
        }

        footer {
            text-align: center;
            padding: 1.5em;
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
        <h1>@yield('header_title', 'Isla Transfers')</h1>
    </header>

    <nav>
        <ul>

        </ul>
    </nav>

    <main>
        <div class="content-section">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>Isla Transfers 2024</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/es.js"></script>
    @yield('scripts')
</body>
</html>

