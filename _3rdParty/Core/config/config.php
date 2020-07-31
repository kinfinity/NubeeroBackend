<?php


    namespace _3rdParty\Core\config;

    require 'vendor/autoload.php';
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable("../../.env");
    $dotenv->load();

    echo $_ENV['LEADWAY_AUTH_KEY'];
    echo $_ENV['DB_HOST'];
    echo $_ENV['DB_PORT'];
    echo $_ENV['DB_DATABASE'];
    echo $_ENV['DB_USERNAME'];
    echo $_ENV['DB_PASSWORD'];


    class config
    {
        private static string $LEADWAYAUTH_KEY;
        private static string $DATABASE_URI;
        private static string $DATABASE_USER;
        private static string $DATABASE_PASS;
        
        public function __construct()
        {
            // leadway api auth
            config::$LEADWAYAUTH_KEY = $_ENV[''];
            // build DB_URI
            // "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
            

        }

        public function _get_LEADWAYAUTH()
        {
            return config::$LEADWAYAUTH_KEY;
        }

        public function _get_DATABASE_URI()
        {
            return config::$DATABASE_URI;
        }
        public function _get_DATABASE_USER()
        {
            return config::$DATABASE_USER;
        }
        public function _get_DATABASE_PASS()
        {
            return config::$DATABASE_PASS;
        }

    }

?>