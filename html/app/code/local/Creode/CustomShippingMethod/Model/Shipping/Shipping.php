<?php

class Creode_CustomShippingMethod_Model_Shipping_Shipping extends Mage_Shipping_Model_Shipping
{
    public function collectCarrierRates($carrierCode, $request)
    {
        if ($carrierCode === 'customshippingmethod') {
            // @todo get real values from parameter
            $helper = Mage::helper('customshippingmethod');
            $categoriesCustomShippingMethod = $helper->getCategoriesIdWithCustomShippingMethod();

            $cart = Mage::getModel('checkout/cart')->getQuote();

            foreach ($cart->getAllItems() as $item) {
                
                // We need to instantiate the product in order to get the custom attributes
                $product = Mage::getModel('catalog/product')->load($item->getProduct()->getId());
                $productIsCustomShippingMethod = $product->getData('apply_custom_shipping_method');
                $productCategories = $product->getCategoryIds();

                if(!$productIsCustomShippingMethod) {
                    // There is at least one product not shippable with Custom Shipping Method
                    return $this;
                }

                if(count(array_intersect($productCategories, $categoriesCustomShippingMethod)) < 0) {
                    // There is at least one product withouth a category enabled for been shippable with Custom Shipping Method
                    return $this;
                }
            }
        }
        
        return parent::collectCarrierRates($carrierCode, $request);
    }
}