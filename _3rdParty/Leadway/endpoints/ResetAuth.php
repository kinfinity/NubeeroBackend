<?php

    namespace _3rdParty\Leadway\endpoints;

    use _3rdParty\Leadway\config\LeadwayInit;
    use _3rdParty\Leadway\models\request\ResetAuthRequest;
    use _3rdParty\Leadway\models\response\ResetAuthResponse;
    use _3rdParty\Core\client\CurlClient;
    use _3rdParty\Core\config\config;
    
    class ResetAuth
    {
        //
        private static config $config;
        public function __construct(config $config)
        {
            //
            ResetAuth::$config = $config;
        }
        
        public function Request(ResetAuthRequest $request_body)
        {
            try
            {    
                //
                $_LeadwayConfig = new LeadwayInit(ResetAuth::$config);
                $curlClient = new CurlClient();
                $response = $curlClient->GET($_LeadwayConfig->get_resetAuthKey_URL(),$request_body);
                $ResetAuthResponse = new ResetAuthResponse();
                $ResetAuthResponse->authorizationKey = $response;
                $ResetAuthResponse->message = $response; // --fix
                return $ResetAuthResponse;
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