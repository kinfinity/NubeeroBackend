<?php

    class HealthInsuranceResponse extends ResponseBase
    {
        public int $premium;
        public int $totalPremium;
        public string $quoteNo;
        public string $bankName;
        public string $accountNo;
    }

?>