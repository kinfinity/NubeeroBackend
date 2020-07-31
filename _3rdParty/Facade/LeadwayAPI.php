<?php

    namespace _3rdParty\Facade;

    use _3rdParty\Leadway\endpoints\AutobaseMotorInsurance;
    use _3rdParty\Leadway\models\request\AutobaseMotorInsuranceRequest;
    use _3rdParty\Leadway\endpoints\CreatePolicy4mQuotation;
    use _3rdParty\Leadway\models\request\CreatePolicy4mQuotationRequest;
    use _3rdParty\Leadway\endpoints\GetQuotation;
    use _3rdParty\Leadway\models\request\GetQuotationRequest;
    use _3rdParty\Leadway\endpoints\HealthInsurance;
    use _3rdParty\Leadway\models\request\HealthInsuranceRequest;
    use _3rdParty\Leadway\endpoints\Pay4Quotation;
    use _3rdParty\Leadway\models\request\Pay4QuotationRequest;

    use _3rdParty\Core\config\config;

    class LeadwayAPI{

        private static $config;
        
        public function __construct(config $config)
        {
            LeadwayAPI::$config = $config;
        }

        public function MotorInsurance(AutobaseMotorInsuranceRequest $motorIns_Req)
        {
            //
            $client = new AutobaseMotorInsurance(LeadwayAPI::$config);
            return $client->Request($motorIns_Req);
        }
        public function CreatePolicy4mQuotation(CreatePolicy4mQuotationRequest $createP4Q_Req)
        {
            //
            $client = new CreatePolicy4mQuotation(LeadwayAPI::$config);
            return $client->Request($createP4Q_Req);

        }
        public function GetQuotation(GetQuotationRequest $getquote_Req)
        {
            //
            $client = new GetQuotation(LeadwayAPI::$config);
            return $client->Request($getquote_Req);

        }

        public function HealthInsurance(HealthInsuranceRequest $healthIns_Req)
        {
            //
            $client = new HealthInsurance(LeadwayAPI::$config);
            return $client->Request($healthIns_Req);

        }
        public function Pay4Quotation(Pay4QuotationRequest $pay4Quote_Req)
        {
            //
            $client = new Pay4Quotation(LeadwayAPI::$config);
            return $client->Request($pay4Quote_Req);
        }
        // public function ResetAuth(ResetAuthRequest $resetauth_Req)
        // {
            // DO NOT USE THIS ENDPOINT
            // $client = new ResetAuth(LeadwayAPI::$config);
            // $client->Request($resetauth_Req);

        // }

    }

?>