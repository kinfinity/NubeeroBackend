<?php

    namespace _3rdParty\Leadway\models\response;

    use _3rdParty\Leadway\models\ResponseBase;
    
    class Pay4QuotationResponse extends ResponseBase
    {
        public string $paymentUrl;
        public bool $paystackUrl;
        public $PolicyNo;
        public $message;
    }

?>