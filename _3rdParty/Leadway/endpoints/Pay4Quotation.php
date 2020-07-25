<?php

    include_once("api/_3rdParty/Leadway/models/request/Pay4QuotationRequest.php");
    include_once("api/_3rdParty/Leadway/models/response/Pay4QuotationResponse.php");
    include_once("api/_3rdParty/Core/client/CurlClient.php");
    class Pay4Quotation
    {
        //
        private static config $config;
        public function __construct(config $config)
        {
            //
            Pay4Quotation::$config = $config;

        }
        
        public function Request(Pay4QuotationRequest $request_body)
        {
            try 
            {    
                //
                $_LeadwayConfig = new LeadwayInit(Pay4Quotation::$config);
                $curlClient = new CurlClient();
                $response = $curlClient->POST($_LeadwayConfig->get_pay4Quotation_URL(),$request_body);
                // var_dump($response);
                $Pay4QuotationResponse = new Pay4QuotationResponse();
                $Pay4QuotationResponse->paymentUrl = $response["paymentUrl"];
                $Pay4QuotationResponse->paystackUrl = $response["paystackUrl"];
                $Pay4QuotationResponse->PolicyNo = $response["PolicyNo"]; 
                $Pay4QuotationResponse->message = $response["message"];
                // var_dump($Pay4QuotationResponse);
               return $Pay4QuotationResponse;

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