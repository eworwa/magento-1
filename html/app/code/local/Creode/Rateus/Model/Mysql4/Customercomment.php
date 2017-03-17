<?php
class Creode_Rateus_Model_Mysql4_Customercomment extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("rateus/customercomment", "id");
    }
}