<?php
// ClienteController.php - Controlador de Cliente
require_once dirname(__DIR__) . '/dao/DAOFactory.php';

class ClienteController {
    private $clienteDAO;

    public function __construct() {
        DAOFactory::init();
        $this->clienteDAO = DAOFactory::getClienteDAO();
    }

    public function registrarCliente($datos) {
        if (isset($datos['nombre'], $datos['apellido1'], $datos['apellido2'], $datos['direccion'], $datos['codigoPostal'], 
                  $datos['ciudad'], $datos['pais'], $datos['email'], $datos['password'])) {
            // Intentar registrar el cliente con todos los datos
            if ($this->clienteDAO->registrarCliente($datos)) { // Cambio aquí
                $_SESSION['mensaje_exito'] = "Cliente registrado con éxito";
                header("Location: /cliente/login");
                exit();
            } else {
                $_SESSION['mensaje_error'] = "Error al registrar el cliente";
                header("Location: /cliente/registrar");
                exit();
            }
        } else {
            $_SESSION['mensaje_error'] = "Error: Datos incompletos para registrar el cliente.";
            header("Location: /cliente/registrar");
            exit();
        }
    }

    public function login($datos) {
        if (isset($datos['email']) && isset($datos['password'])) {
            // Si es el usuario administrador
            if ($datos['email'] === 'admin@islatransfers.com' && $datos['password'] === 'Admin') {
                // Manejo de sesión para el administrador
                $_SESSION['cliente_id'] = 'admin';
                $_SESSION['tipo_cliente'] = 'administrador';
                $_SESSION['email_cliente'] = $datos['email']; // Guardar el email en la sesión
                header("Location: /admin/home");
                exit();
            }
    
            // Si no es administrador, buscar el cliente en la base de datos
            $cliente = $this->clienteDAO->obtenerClientePorEmail($datos['email']); // Cambio aquí
    
            if ($cliente && $cliente['password'] === $datos['password']) {
                // Manejo de sesión para clientes
                $_SESSION['cliente_id'] = $cliente['id_viajero'];
                $_SESSION['tipo_cliente'] = 'particular';
                $_SESSION['email_cliente'] = $cliente['email']; // Guardar el email en la sesión
    
                // Verificar si el nombre existe en el resultado
                if (isset($cliente['nombre'])) {
                    $_SESSION['nombre_cliente'] = $cliente['nombre'];
                } else {
                    echo "Error: No se pudo obtener el nombre del cliente.";
                    exit();
                }
    
                header("Location: /cliente/home");
                exit();
            } else {
                echo "Credenciales incorrectas";
                header("Location: /cliente/login");
                exit();
            }
        } else {
            echo "Error: Datos de inicio de sesión incompletos.";
        }
    }

    public function obtenerClientePorId($id) {
        $cliente = $this->clienteDAO->obtenerClientePorId($id); // Cambio aquí
        if ($cliente) {
            return $cliente;
        } else {
            echo "Cliente no encontrado";
            return null;
        }
    }

    public function modificarCliente($id, $datos) {
        // Verificar si el nombre y el email están completos
        if (isset($datos['nombre'], $datos['email'])) {
            // Solo hash de la contraseña si se proporciona
            if (!empty($datos['password'])) {
                $datos['password'] = $datos['password'];
            } else {
                // Si no hay contraseña, eliminamos este campo de `$datos`
                unset($datos['password']);
            }
            
            if ($this->clienteDAO->modificarCliente($id, $datos)) { // Cambio aquí
                $_SESSION['mensaje_exito'] = "Datos actualizados con éxito";
            } else {
                $_SESSION['mensaje_error'] = "Error al actualizar los datos";
            }
            header("Location: /cliente/perfil");
            exit();
        } else {
            $_SESSION['mensaje_error'] = "Error: Datos incompletos para actualizar el cliente.";
            header("Location: /cliente/perfil");
            exit();
        }
    }
}

?>
