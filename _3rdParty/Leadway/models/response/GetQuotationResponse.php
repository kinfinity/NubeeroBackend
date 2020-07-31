<?php

    namespace _3rdParty\Leadway\models\response;

    use _3rdParty\Leadway\models\ResponseBase;
    
    class GetQuotationResponse extends ResponseBase
    {
        public string $quoteNo;
        public int $totalPremium;
        public $vehicleResult = []; // VehicleResult  class type
    }

?>