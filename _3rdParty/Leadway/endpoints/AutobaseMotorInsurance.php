<?php

    namespace _3rdParty\Leadway\endpoints;


    use _3rdParty\Leadway\config\LeadwayInit;
    use _3rdParty\Leadway\models\request\AutobaseMotorInsuranceRequest;
    use _3rdParty\Leadway\models\response\AutobaseMotorInsuranceResponse;
    use _3rdParty\Leadway\models\objects\VehicleResult;
    use _3rdParty\Core\client\CurlClient;
    use _3rdParty\Core\config\config;

    class AutobaseMotorInsurance
    {
        //
        private static config $config;
        public function __construct(config $config)
        {
            //
            AutobaseMotorInsurance::$config = $config;

        }
        
        public function Request(AutobaseMotorInsuranceRequest $request_body)
        {
            try 
            {    
                //
                $_LeadwayConfig = new LeadwayInit(AutobaseMotorInsurance::$config);
                $curlClient = new CurlClient();
                $response = $curlClient->POST($_LeadwayConfig->get_motorInsurance_URL(),$request_body);
                // var_dump($response);
                $AutobaseMotorInsuranceResponse = new AutobaseMotorInsuranceResponse();
                $AutobaseMotorInsuranceResponse->PolicyNo = $response["PolicyNo"];
                $AutobaseMotorInsuranceResponse->accountNo = $response["accountNo"];
                $AutobaseMotorInsuranceResponse->bankName = $response["bankName"]; 
                $AutobaseMotorInsuranceResponse->certificateUrl = $response["certificateUrl"];
                $AutobaseMotorInsuranceResponse->quoteNo = $response["quoteNo"];
                $AutobaseMotorInsuranceResponse->totalPremium = $response["totalPremium"];

                foreach($response["vehicleResult"] as $vehicle)
                {
                    $v = new VehicleResult();
                    $v->description = $vehicle["description"];
                    $v->premium = $vehicle["premium"];
                    $v->registrationNo = $vehicle["registrationNo"];
                    $AutobaseMotorInsuranceResponse->vehicleResult[] = $v;
                }

                // var_dump($AutobaseMotorInsuranceResponse);
                return $AutobaseMotorInsuranceResponse;

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