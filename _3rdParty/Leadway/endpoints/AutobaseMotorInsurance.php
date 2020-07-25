<?php

    include_once("api/_3rdParty/Leadway/models/request/AutobaseMotorInsuranceRequest.php");
    include_once("api/_3rdParty/Leadway/models/response/AutobaseMotorInsuranceResponse.php");
    include_once("api/_3rdParty/Leadway/models/objects/VehicleResult.php");
    include_once("api/_3rdParty/Core/client/CurlClient.php");
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