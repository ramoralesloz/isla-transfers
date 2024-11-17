<?php
// DAOFactory.php - Fábrica para obtener instancias de DAOs
require_once dirname(__DIR__) . '/DAO/ClienteDAO.php';
require_once dirname(__DIR__) . '/DAO/HotelDAO.php';
require_once dirname(__DIR__) . '/DAO/ReservaDAO.php';
require_once dirname(__DIR__) . '/DAO/VehiculoDAO.php';

class DAOFactory {
    private static $db;

    public static function init() {
        if (!self::$db) {
            self::$db = Database::getInstance()->getConnection();
        }
    }

    public static function getClienteDAO() {
        return new ClienteDAO(self::$db);
    }

    public static function getHotelDAO() {
        return new HotelDAO(self::$db);
    }

    public static function getReservaDAO() {
        return new ReservaDAO(self::$db);
    }

    public static function getVehiculoDAO() {
        return new VehiculoDAO(self::$db);
    }
}
?>

