<?php

    include_once("api/_3rdParty/Leadway/models/ResponseBase.php");

    class ResetAuthResponse extends ResponseBase
    {
        public $authorizationKey;
        public string $message;
    }

?>