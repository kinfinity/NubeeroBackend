<?php

    namespace _3rdParty\Leadway\models\response;

    use _3rdParty\Leadway\models\ResponseBase;

    class CreatePolicy4mQuotationResponse extends ResponseBase
    {
        public string $PolicyNo;
        public string $message;
        public $paymentUrl;
    }

?>