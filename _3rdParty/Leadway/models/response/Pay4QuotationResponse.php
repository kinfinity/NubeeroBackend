<?php

    class Pay4QuotationResponse extends ResponseBase
    {
        public string $paymentUrl;
        public bool $paystackUrl;
        public $PolicyNo;
        public $message;
    }

?>