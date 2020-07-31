<?php


    namespace _3rdParty\Core\utils;

    require 'vendor/autoload.php'; 
    use PHPMailer\PHPMailer\Exception;

    class ConfigException extends \Exception {

        public function errorMessage() {
            //error message
            $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
            .': <b>'.$this->getMessage().'</b> NULL / Invalid ENVIROMENT Config variable';
            return $errorMsg;
        }

    }

?>