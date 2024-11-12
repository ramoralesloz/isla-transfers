<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas - Calendario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/es.js"></script>
    <link rel="stylesheet" href="/public/css/styles.css">
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
            margin-bottom: 2em;
        }

        #calendar {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    <header>
        <h1>Calendario de Reservas</h1>
    </header>
    <div id="calendar"></div>

    <div class="volver-menu">
        <a href="/admin/home">Volver al Menú Anterior</a>
    </div>

    <footer>
        <p>Isla Transfers - Todos los derechos reservados &copy; 2024</p>
    </footer>

    <script>
        $(document).ready(function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    <?php if (!empty($reservas) && is_array($reservas)): ?>
                        <?php foreach ($reservas as $reserva): ?>
                        {
                            title: 'Reserva <?= htmlspecialchars($reserva["localizador"]) ?>',
                            start: '<?= $reserva["fecha_entrada"] . "T" . ($reserva["hora_entrada"] ?? "00:00:00") ?>',
                            url: '/reserva/detalle?id=<?= urlencode($reserva["id_reserva"]) ?>'
                        },
                        <?php endforeach; ?>
                    <?php endif; ?>
                ],
                eventClick: function (info) {
                    info.jsEvent.preventDefault(); // Prevent browser from following link
                    if (info.event.url) {
                        window.location.href = info.event.url;
                    }
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>


