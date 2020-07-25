<?php

    class AutobaseMotorInsuranceResponse extends ResponseBase
    {
        public string $PolicyNo;
        public string $accountNo;
        public string $bankName;
        public string $certificateUrl;
        public string $quoteNo;
        public int $totalPremium;
        public $vehicleResult = []; // VehicleResult  class type
    }

?>