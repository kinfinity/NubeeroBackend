<?php

    namespace _3rdParty\Leadway\models\request;

    use _3rdParty\Leadway\models\objects\BankInfo;
    use _3rdParty\Leadway\models\objects\Base64StringGroup;

    class CreatePolicy4mQuotationRequest
    {
        public string $quoteNo;
        public string $paymentReferenceNo;
        public $issueCreditNote;
        public $creditNote;
        public int $height;
        public int $width;
        public bool $useWalletPayment;
        public string $additionalComment;
        public $callBackPaymentPage;
        public $callBackUrl;
        public $beneficiaries = []; // Beneficiary class type
        public $medicalAnswer = []; // MedicalAnswer  class type
        public BankInfo $bankInfo;
        public Base64StringGroup $clientPassportBase64String;
        public Base64StringGroup $clientSignatureBase64String;
        public $otherFileUpload = []; // Base64StringGroup class type
        public ?string $annuityBankInfo;
        public $signature;

    }

?>