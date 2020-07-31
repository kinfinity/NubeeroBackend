<?php

    namespace _3rdParty\Leadway\models\response;

    use _3rdParty\Leadway\models\ResponseBase;
    
    class HealthInsuranceResponse extends ResponseBase
    {
        public int $premium;
        public int $totalPremium;
        public string $quoteNo;
        public string $bankName;
        public string $accountNo;
    }

?>