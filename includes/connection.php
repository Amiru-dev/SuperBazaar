<?php

require_once __DIR__ . "/../config.php";

class Database
{

    public static $connection;

    public static function setupConnection()
    {

        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        }
    }

    public static function iud($q)
    {

        Database::setupConnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {

        Database::setupConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}

/**
 * Escape a value for safe HTML output.
 */
function e($value): string
{
    return htmlspecialchars((string) ($value ?? ""), ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

?>