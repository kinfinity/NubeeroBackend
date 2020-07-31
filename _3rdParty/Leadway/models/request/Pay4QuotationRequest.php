<?php

    namespace _3rdParty\Leadway\models\request;
    
    use _3rdParty\Leadway\models\objects\BankInfo;
    use _3rdParty\Leadway\models\objects\Base64StringGroup;

    class Pay4QuotationRequest
    {
        public string $signature;
        public string $quoteNo;
        public $beneficiaries = []; //  Beneficiary class type
        public bool $useWalletPayment;
        public $callBackUrl;
        public string $additionalComment;
        public int $height;
        public int $width;
        public BankInfo $bankInfo;
        public $medicalAnswer = []; // MedicalAnswer  class type
        public Base64StringGroup $clientPassportBase64String;
        public Base64StringGroup $clientSignatureBase64String;
        public $otherFileUpload = []; // Base64StringGroup  class type
        public ?string $annuityBankInfo;
    }

?>