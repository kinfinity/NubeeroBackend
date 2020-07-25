<?php

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