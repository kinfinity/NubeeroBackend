<?php

    class GetQuotationRequest
    {
        public ClientInfo $clientInfo;
        public string $clientNo;
        public $vehicles = []; // Vehicle class type
        public string $signature;
    }

?>