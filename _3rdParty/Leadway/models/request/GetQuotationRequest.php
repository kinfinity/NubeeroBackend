<?php

    namespace _3rdParty\Leadway\models\request;
    use _3rdParty\Leadway\models\objects\ClientInfo;

    class GetQuotationRequest
    {
        public ClientInfo $clientInfo;
        public string $clientNo;
        public $vehicles = []; // Vehicle class type
        public string $signature;
    }

?>