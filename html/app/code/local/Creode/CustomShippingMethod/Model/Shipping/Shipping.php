<?php

class Creode_CustomShippingMethod_Model_Shipping_Shipping extends Mage_Shipping_Model_Shipping
{
    public function collectCarrierRates($carrierCode, $request)
    {
        echo "here";
        die;
        
        return parent::collectCarrierRates($carrierCode, $request);
    }
}

// https://www.smartiehastheanswer.co.uk/magento/filtering-a-shipping-method-in-magento.html