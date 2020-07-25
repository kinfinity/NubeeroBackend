<?php

class FacadeBase {

    private $_RefObject;
    private $_Class = '';

    public function __construct(&$RefObject) {
        $this->_Class = get_class($RefObject);
        $this->_RefObject = $RefObject;
    }

    public function __set($sProperty,$mixed) {
        $sPlugin = $this->_Class . '_' . $sProperty . '_setEvent';
        if (is_callable($sPlugin)) {
            $mixed = call_user_func_array($sPlugin, $mixed);
        }   
        $this->_RefObject->$sProperty = $mixed;
    }

    public function __get($sProperty) {
        $asItems = (array) $this->_RefObject;
        $mixed = $asItems[$sProperty];
        $sPlugin = $this->_Class . '_' . $sProperty . '_getEvent';
        if (is_callable($sPlugin)) {
            $mixed = call_user_func_array($sPlugin, $mixed);
        }   
        return $mixed;
    }

    public function __call($sMethod,$mixed) {
        $sPlugin = $this->_Class . '_' .  $sMethod . '_beforeEvent';
        if (is_callable($sPlugin)) {
            $mixed = call_user_func_array($sPlugin, $mixed);
        }
        if ($mixed != 'BLOCK_EVENT') {
            call_user_func_array(array(&$this->_RefObject, $sMethod), $mixed);
            $sPlugin = $this->_Class . '_' . $sMethod . '_afterEvent';
            if (is_callable($sPlugin)) {
                call_user_func_array($sPlugin, $mixed);
            }       
        } 
    }

}
