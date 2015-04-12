<?php namespace Ottowayne\SQLiteMigrationFix\Database;

use Illuminate\Database\Connectors\ConnectionFactory as OriginalConnectionFactory;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\SqlServerConnection;
use InvalidArgumentException;
use PDO;

class ConnectionFactory extends OriginalConnectionFactory
{

    /**
     * Create a new connection instance.
     *
     * @param  string   $driver
     * @param  \PDO     $connection
     * @param  string   $database
     * @param  string   $prefix
     * @param  array    $config
     * @return \Illuminate\Database\Connection
     *
     * @throws \InvalidArgumentException
     */
    protected function createConnection($driver, PDO $connection, $database, $prefix = '', array $config = array())
    {
        if (!app()->environment('testing')) {
            return parent::createConnection($driver, $connection, $database, $prefix, $config);
        }

        if ($this->container->bound($key = "db.connection.{$driver}")) {
            return $this->container->make($key, array($connection, $database, $prefix, $config));
        }

        switch ($driver) {
            case 'mysql':
                return new MySqlConnection($connection, $database, $prefix, $config);

            case 'pgsql':
                return new PostgresConnection($connection, $database, $prefix, $config);

            case 'sqlite':
                return new SQLiteConnection($connection, $database, $prefix, $config);

            case 'sqlsrv':
                return new SqlServerConnection($connection, $database, $prefix, $config);
        }

        throw new InvalidArgumentException("Unsupported driver [$driver]");
    }
}
