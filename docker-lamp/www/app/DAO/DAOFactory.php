<?php
// DAOFactory.php - Fábrica para obtener instancias de DAOs
require_once dirname(__DIR__) . '/dao/ClienteDAO.php';
require_once dirname(__DIR__) . '/dao/HotelDAO.php';
require_once dirname(__DIR__) . '/dao/ReservaDAO.php';
require_once dirname(__DIR__) . '/dao/VehiculoDAO.php';

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

