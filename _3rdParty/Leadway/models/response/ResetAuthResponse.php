<?php

    namespace _3rdParty\Leadway\models\response;

    use _3rdParty\Leadway\models\ResponseBase;
    
    class ResetAuthResponse extends ResponseBase
    {
        public $authorizationKey;
        public string $message;
    }

?>