<?php

    class GetQuotationResponse extends ResponseBase
    {
        public string $quoteNo;
        public int $totalPremium;
        public $vehicleResult = []; // VehicleResult  class type
    }

?>