<?php

    include_once("api/_3rdParty/Leadway/models/request/HealthInsuranceRequest.php");
    include_once("api/_3rdParty/Leadway/models/response/HealthInsuranceResponse.php");
    include_once("api/_3rdParty/Core/client/CurlClient.php");
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
            catch (Exception $e) 
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