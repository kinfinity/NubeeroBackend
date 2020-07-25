<?php

    class RequestT implements JsonSerializable {

        protected $request;
     
        function setPartner(object $request) {
            $this->request;
        }
     
        public function jsonSerialize() {
             $data['request'] = $this->request;
             return $data;
         }
     }

    //$Request = new RequestT();
    //json_encode($Request);

?>
