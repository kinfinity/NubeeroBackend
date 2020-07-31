<?php

    namespace _3rdParty\Leadway\models\request;
    
    use _3rdParty\Leadway\models\objects\ClientInfo;
    use _3rdParty\Leadway\models\objects\Vehicle;

    class HealthInsuranceRequest
    {
        public $productSubClass;
        public $productCode;
        public ClientInfo $clientInfo;
        public $clientNo;
        public ?Vehicle $vehicle;
        public ?string $building;
        public ?string $staffs;
        public string $signature;
    }

?>