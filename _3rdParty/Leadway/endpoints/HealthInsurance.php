<?php

    namespace _3rdParty\Leadway\endpoints;

    use _3rdParty\Leadway\config\LeadwayInit;
    use _3rdParty\Leadway\models\request\HealthInsuranceRequest;
    use _3rdParty\Leadway\models\response\HealthInsuranceResponse;
    use _3rdParty\Core\client\CurlClient;
    use _3rdParty\Core\config\config;

    class HealthInsurance
    {
        //
        private static config $config;
        public function __construct(config $config)
        {
            //
            HealthInsurance::$config = $config;

        }
        
        public function Request(HealthInsuranceRequest $request_body)
        {
            try 
            {    
                //
                $_LeadwayConfig = new LeadwayInit(HealthInsurance::$config);
                $curlClient = new CurlClient();
                $response = $curlClient->POST($_LeadwayConfig->get_healthInsurance_URL(),$request_body);
                // var_dump($response);
                $HealthInsuranceResponse = new HealthInsuranceResponse();
                $HealthInsuranceResponse->premium = $response["premium"];
                $HealthInsuranceResponse->totalPremium = $response["totalPremium"];
                $HealthInsuranceResponse->quoteNo = $response["quoteNo"]; 
                $HealthInsuranceResponse->bankName = $response["bankName"];
                $HealthInsuranceResponse->accountNo = $response["accountNo"];
                // var_dump($HealthInsuranceResponse);
                return $HealthInsuranceResponse;

            }
            catch (\Exception $e) 
            {
                //
                echo 'Error LOG: '. $e->error_log;

            }
            finally
            {
                // Manual clean up.
                
            }
            
        }
        
    }

?>