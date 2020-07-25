<?php

    include_once("api/_3rdParty/Leadway/models/request/GetQuotationRequest.php");
    include_once("api/_3rdParty/Leadway/models/response/GetQuotationResponse.php");
    include_once("api/_3rdParty/Core/client/CurlClient.php");

    class GetQuotation
    {
        //
        private static config $config;
        public function __construct(config $config)
        {
            //
            GetQuotation::$config = $config;

        }
        
        public function Request(GetQuotationRequest $request_body)
        {
            try 
            {    
                //
                $_LeadwayConfig = new LeadwayInit(GetQuotation::$config);
                $curlClient = new CurlClient();
                $response = $curlClient->POST($_LeadwayConfig->get_Quotation_URL(),$request_body);
                // var_dump($response);
                $GetQuotationResponse = new GetQuotationResponse();
                $GetQuotationResponse->quoteNo = $response["PolicyNo"];
                $GetQuotationResponse->totalPremium = $response["accountNo"]; 
                foreach($response["vehicleResult"] as $vehicle)
                {
                    $v = new VehicleResult();
                    $v->description = $vehicle["description"];
                    $v->premium = $vehicle["premium"];
                    $v->registrationNo = $vehicle["registrationNo"];
                    $GetQuotationResponse->vehicleResult[] = $v;
                }

                // var_dump($GetQuotationResponse);
               return $GetQuotationResponse;

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