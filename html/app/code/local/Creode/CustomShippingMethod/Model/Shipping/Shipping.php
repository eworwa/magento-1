<?php

class Creode_CustomShippingMethod_Model_Shipping_Shipping extends Mage_Shipping_Model_Shipping
{
    public function collectCarrierRates($carrierCode, $request)
    {
        if ($carrierCode === 'customshippingmethod') {

            $orderIsElegible = true;
            
            $helper = Mage::helper('customshippingmethod');
            $categoriesCustomShippingMethod = $helper->getCategoriesIdWithCustomShippingMethod();

            $cart = Mage::getModel('checkout/cart')->getQuote();

            foreach ($cart->getAllItems() as $item) {
                
                // We need to instantiate the product in order to get the custom attributes
                $product = Mage::getModel('catalog/product')->load($item->getProduct()->getId());
                $productIsCustomShippingMethod = $product->getData('apply_custom_shipping_method');
                $productCategories = $product->getCategoryIds();

                if(!$productIsCustomShippingMethod && count(array_intersect($productCategories, $categoriesCustomShippingMethod)) <= 0) {
                    // This product is not shippable with Custom Shipping Method at all
                    // therefore the entire order is not shippable through this method
                    $orderIsElegible = false;
                }
            }

            if(!$orderIsElegible) {
                return $this;
            }
        }
        
        return parent::collectCarrierRates($carrierCode, $request);
    }
}