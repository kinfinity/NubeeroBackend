<?php

    include_once("api/_3rdParty/Leadway/models/request/CreatePolicy4mQuotationRequest.php");
    include_once("api/_3rdParty/Leadway/models/response/CreatePolicy4mQuotationResponse.php");
    include_once("api/_3rdParty/Core/client/CurlClient.php");

    class CreatePolicy4mQuotation
    {
        //
        private static config $config;
        public function __construct(config $config)
        {
            //
            CreatePolicy4mQuotation::$config = $config;

        }
        
        public function Request(CreatePolicy4mQuotationRequest $request_body)
        {
            try 
            {    
                //
                $_LeadwayConfig = new LeadwayInit(CreatePolicy4mQuotation::$config);
                $curlClient = new CurlClient();
                $response = $curlClient->POST($_LeadwayConfig->get_createPolicy4mQuotation_URL(),$request_body);
                // var_dump($response);
                $CreateP4QResponse = new CreatePolicy4mQuotationResponse();
                $CreateP4QResponse->PolicyNo = $response["PolicyNo"];
                $CreateP4QResponse->message = $response["message"];
                $CreateP4QResponse->paymentUrl = $response["paymentUrl"]; 
                
                // var_dump($CreateP4QResponse);
                return $CreateP4QResponse;

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