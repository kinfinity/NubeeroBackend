<?php

    namespace _3rdParty\Leadway\models\request;

    use _3rdParty\Leadway\models\objects\ClientInfo;

    class AutobaseMotorInsuranceRequest
    {
        public ClientInfo $clientInfo;
        public $clientNo;
        public $vehicle = []; // Vehicle class type
        public string $signature;
    }

?>