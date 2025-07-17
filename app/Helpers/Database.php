<?php
namespace App\Helpers;

use PDO;
use PDOException;

/**
 * Handles PDO connection to SQL Server.
 */
class Database
{
    private static ?PDO $pdo = null;

    /**
     * Get PDO instance using configuration.
     */
    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            $config = require __DIR__ . '/../../config/database.php';
            $dsn = sprintf('%s:Server=%s;Database=%s', $config['driver'], $config['host'], $config['database']);
            self::$pdo = new PDO($dsn, $config['username'], $config['password']);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}
