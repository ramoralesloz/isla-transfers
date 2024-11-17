<?php
// index.php - Punto de entrada principal para la aplicación

// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Manejo de sesiones
ob_start();
session_start();

// Definir la ruta base del proyecto
define('BASE_PATH', dirname(__DIR__));
//local
define('BASE_URI', '/backendteam/AppPHP/public');
//servidor
//define('BASE_URI', '/~uocx1/backendteam/AppPHP/public');

// Cargar configuraciones y controladores necesarios
require_once BASE_PATH . '/config/Database.php';
require_once BASE_PATH . '/app/controllers/ReservaController.php';
require_once BASE_PATH . '/app/controllers/ClienteController.php';
require_once BASE_PATH . '/app/controllers/VehiculoController.php';
require_once BASE_PATH . '/app/controllers/HotelController.php';

// Obtener la URL solicitada
//local
$uri = str_replace(BASE_URI, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//servidor
//$uri = str_replace(BASE_URI, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

//echo "<pre>";
//var_dump($uri, bin2hex($uri));
//echo "</pre>";
//exit();
$method = $_SERVER['REQUEST_METHOD'];
// Enrutamiento de la aplicación
switch (trim($uri, '/')) {
    case '':
        include BASE_PATH . '/app/views/home_login.php';
        break;
    

        case 'reserva/crear':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller = new ReservaController();
                $controller->crearReserva($_POST);
            } else {
                include BASE_PATH . '/app/views/reservas/crear_reserva_cliente.php';
            }
        break;

        case 'reserva/listar':
            if (isset($_SESSION['cliente_id']) && $_SESSION['tipo_cliente'] === 'particular') {
                $controller = new ReservaController();
                $reservas = $controller->listarReservas(); // Almacenar las reservas devueltas por el método
                include BASE_PATH . '/app/views/reservas/listar.php'; // Incluir la vista aquí
            } else {
                //header('Location: /cliente/login');
                exit();
            }
            break;

        case 'cliente/login':
            if ($method === 'POST') {
                $controller = new ClienteController();
                $controller->login($_POST);
            } else {
                include BASE_PATH . '/app/views/clientes/login.php';
            }
        break;

        case 'cliente/registrar':
            if ($method === 'POST') {
                $controller = new ClienteController();
                $controller->registrarCliente($_POST);
            } else {
                include BASE_PATH . '/app/views/clientes/registro.php';
            }
        break;

        case 'cliente/perfil':
            if (isset($_SESSION['cliente_id'])) {
                $controller = new ClienteController();
                $cliente = $controller->obtenerClientePorId($_SESSION['cliente_id']);
                include BASE_PATH . '/app/views/clientes/perfil.php';
            } else {
                header('Location: ' . BASE_URI . '/cliente/login');
                exit();
            }
        break;
        case 'cliente/modificar':
            if ($method === 'POST') {
                if (isset($_SESSION['cliente_id'])) {
                    $controller = new ClienteController();
                    $controller->modificarCliente($_SESSION['cliente_id'], $_POST);
                } else {
                    header('Location: ' . BASE_URI . '/cliente/login');
                    exit();
                }
            }
        break;    

        case 'cliente/home':
            if (isset($_SESSION['tipo_cliente']) && $_SESSION['tipo_cliente'] === 'particular') {
                include BASE_PATH . '/app/views/home_cliente.php';
            } else {
                header('Location: ' . BASE_URI . '/cliente/login');
            exit();
            }
        break;
        case 'admin/home':
            //var_dump($uri); // Mostrar la URI para depuración
            //var_dump($_SESSION); // Mostrar la sesión para verificar valores
        
            if ($uri === '/admin/home') {
               // echo "Entró en el caso /admin/home"; // Mensaje de depuración
                if (isset($_SESSION['tipo_cliente']) && $_SESSION['tipo_cliente'] === 'administrador') {
                    echo "Administrador autenticado"; // Depuración adicional
                    include BASE_PATH . '/app/views/home_admin.php'; // Incluir la vista
                    exit(); // Asegurar que no continúa el flujo
                } else {
                    echo "Redirigiendo a login por falta de permisos"; // Depuración
                    header('Location: ' . BASE_URI . '/cliente/login');
                    exit();
                }
            } else {
                echo "La URI no coincide con /admin/home"; // Depuración de coincidencia
            }
            break;
        

        case 'vehiculo/listar':
            if (isset($_SESSION['tipo_cliente']) && ($_SESSION['tipo_cliente'] === 'administrador' || $_SESSION['tipo_cliente'] === 'corporativo')) {
                $controller = new VehiculoController();
                $vehiculos = $controller->listarVehiculos();
                include BASE_PATH . '/app/views/vehiculos/listar.php';
            } else {
                header('Location: ' . BASE_URI . '/cliente/login');
                exit();
            }
        break;

        case 'hotel/login':
            if ($method === 'POST') {
                $controller = new HotelController();
                $controller->login($_POST);
            } else {
                include BASE_PATH . '/app/views/clientes/login.php';
            }
            break;

        case 'hotel/registrar':
            if ($method === 'POST') {
                $controller = new HotelController();
                $controller->registrarHotel($_POST);
            } else {
                include BASE_PATH . '/app/views/clientes/registro_hotel.php';
            }
        break;

        case 'hotel/home':
            if (isset($_SESSION['tipo_cliente']) && $_SESSION['tipo_cliente'] === 'corporativo') {
                include BASE_PATH . '/app/views/home_hotel.php';
            } else {
                header('Location: ' . BASE_URI . '/hotel/login');
                exit();
            }
        break;        
        case 'reserva/eliminar':
            if ($method === 'GET' && isset($_GET['id'])) {
                $controller = new ReservaController();
                try {
                    $controller->eliminarReserva($_GET['id']);
                } catch (Exception $e) {
                    // Mostrar mensaje de error si algo falla
                    echo "<h1>Error: " . $e->getMessage() . "</h1>";
                    exit();
                }
            } else {
                http_response_code(400);
                echo "<h1>Solicitud inválida</h1>";
            }
            break;

    
        case 'reserva/detalle':
                if (isset($_GET['id'])) {
                    $controller = new ReservaController();
                    $controller->detalleReserva($_GET['id']);
                } else {
                    http_response_code(400);
                    echo "<h1>Solicitud inválida</h1>";
                }
        break;
            
        case 'reserva/calendario':
            if (isset($_SESSION['cliente_id']) && $_SESSION['tipo_cliente'] === 'administrador') {
                $controller = new ReservaController();
                $controller->listarCalendarioReservas();
            } else {
                header('Location: ' . BASE_URI . '/cliente/login');
                exit();
            }
        break;
        case 'reserva/modificar':
            if ($method === 'GET' && isset($_GET['id'])) {
                // Si es una solicitud GET, mostrar el formulario de modificación
                $controller = new ReservaController();
                $reserva = $controller->obtenerReservaPorId($_GET['id']);
                if ($reserva) {
                    $fechaEntrada = new DateTime($reserva['fecha_entrada'] . ' ' . ($reserva['hora_entrada'] ?? '00:00:00'));
                    $fechaActual = new DateTime();
                    $intervalo = $fechaActual->diff($fechaEntrada);
                    $horasRestantes = ($intervalo->days * 24) + $intervalo->h;
        
                    if ($horasRestantes < 48) {
                        // Mostrar mensaje de error si no se puede modificar
                        $_SESSION['mensaje_error'] = "No se puede modificar la reserva con menos de 48 horas de anticipación.";
                        header('Location: ' . BASE_URI . '/reserva/listar');
                        exit();
                    } else {
                        include BASE_PATH . '/app/views/reservas/modificar_reserva.php';
                    }
                } else {
                    http_response_code(404);
                    echo "<h1>Reserva no encontrada</h1>";
                }
            } elseif ($method === 'POST') {
                // Si es una solicitud POST, procesar los cambios en la reserva
                if (isset($_POST['id_reserva'])) {
                    $controller = new ReservaController();
                    $controller->modificarReserva($_POST['id_reserva'], $_POST);
                } else {
                    http_response_code(400);
                    echo "<h1>Solicitud inválida</h1>";
                }
            }
        break;
        case 'en_construccion':
            // Mostrar la página en construcción
            include BASE_PATH . '/app/views/en_construccion.php';
        break;
                    
        default:
        echo "Entró en el caso default";
        var_dump($uri);
        var_dump($_SESSION);
        http_response_code(404);
        echo "<h1>Página no encontrada</h1>";
        break;
}
ob_end_flush();

