<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Isla Transfers')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            padding: 1.5em;
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
            transition: background-color 0.3s, transform 0.3s;
        }

        nav ul li a:hover {
            background-color: #0056b3;
            color: #f0f8ff;
            transform: scale(1.05);
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

        footer p {
            margin: 0;
            font-weight: bold;
            font-size: 1.1em;
        }

        .footer-icons {
            margin-top: 1em;
        }

        .footer-icons a {
            color: #fff;
            margin: 0 0.5em;
            font-size: 1.5em;
            transition: color 0.3s;
        }

        .footer-icons a:hover {
            color: #ffd700;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>@yield('header_title', 'Isla Transfers')</h1>
    </header>

    <nav>
        <ul>
            @auth
                <li><a href="{{ route('welcome') }}"><i class="fas fa-home"></i> Inicio</a></li>
                </li>
            @endauth
            @guest
                <li><a href="{{ route('cliente.login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a></li>
                <li><a href="{{ route('cliente.registrar') }}"><i class="fas fa-user-plus"></i> Registrarse</a></li>
            @endguest
        </ul>
    </nav>

    <main>
        <div class="content-section">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; PHP Laravel Isla Transfers</p>
        <div class="footer-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
    </footer>
    
    @yield('scripts')
</body>
</html>
