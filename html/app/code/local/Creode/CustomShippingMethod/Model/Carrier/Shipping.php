<?php

class Creode_CustomShippingMethod_Model_Carrier_Shipping extends Mage_Shipping_Model_Shipping
{
    public function collectCarrierRates($carrierCode, $request)
    {
        if ($carrierCode === 'customshippingmethod') {
            if (1 == 2) {
                // carrier not available
                return $this;
            }
        }
        
        return parent::collectCarrierRates($carrierCode, $request);
    }
}