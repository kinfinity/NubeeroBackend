<?php

    include_once("api/_3rdParty/Core/config/config.php");
    include_once("api/_3rdParty/Core/utils/ConfigException.php");

	class LeadwayInit{
        
        // :URLS
		private string $baseUrl = "";
		private string $testUrl = "http://mc.leadway.com:89/interBusinessConnection/interBusinessConnection.svc";
        private string $productionUrl = "http://webapp.leadway.com:89/interBusinessConnection/interBusinessConnection.svc";
        
        // Reset Authorization key
        private $resetAuthKey_URL = "general/getVehicleMake/";
        // Get Quotation for Third Party Motor Insurance
        private $getQuotation_URL = "/quotation/thirdPartyMotor/";
        // Create Policy From Quotation
        private $createPolicy4mQuotation_URL = "/quotation/createPolicyFromQuote/";
        // Pay for Quote
        private $pay4Quotation_URL = "/quotation/payforQuotation/";
        // Health insurance
        private $healthInsurance_URL = "/quotation/quoteHealth/";
        // Motor Insurance
        private $motorInsurance_URL = "/quotation/autoBaseMotor/";
        
        public function __construct(config $config) 
        {   
            try
            {
                //
                if($config->ENV == null)
                {
                    // throw new ConfigException();
                }

                echo "\n Config_ENV: " . $config->ENV. "\n";

                //
                if($config->ENV === "PRODUCTION")
                {
                    echo "Welcome to " . $config->ENV. " EnviromentP \n";
                    $this->baseUrl = $this->productionUrl;
                }
                else if($config->ENV === "DEVELOPEMENT")
                {
                    echo "Welcome to " . $config->ENV. " EnviromentD \n";
                    $this->baseUrl = $this->testUrl;
                }

            }
            catch(Exception $e)
            {
                // echo 'Exception_Message: ' .$e->errorMessage();
            }
            
        }

        public function get_resetAuthKey_URL()
        {
            return $this->baseUrl . $this->resetAuthKey_URL;
        }

        public function get_Quotation_URL()
        {
            return $this->baseUrl . $this->getQuotation_URL;
        }
        
        public function get_createPolicy4mQuotation_URL()
        {
            return $this->baseUrl . $this->createPolicy4mQuotation_URL;
        }

        public function get_pay4Quotation_URL()
        {
            return $this->baseUrl . $this->pay4Quotation_URL;
        }

        public function get_healthInsurance_URL()
        {
            return $this->baseUrl . $this->healthInsurance_URL;
        }
        public function get_motorInsurance_URL()
        {
            return $this->baseUrl . $this->motorInsurance_URL;
        }

	}

?>
