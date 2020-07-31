<?php

    namespace _3rdParty\Leadway\endpoints;

    use _3rdParty\Leadway\config\LeadwayInit;
    use _3rdParty\Leadway\models\request\CreatePolicy4mQuotationRequest;
    use _3rdParty\Leadway\models\response\CreatePolicy4mQuotationResponse;
    use _3rdParty\Core\client\CurlClient;
    use _3rdParty\Core\config\config;

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