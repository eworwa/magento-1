<?php

class Creode_CustomShippingMethod_Model_Shipping_Shipping extends Mage_Shipping_Model_Shipping
{
    public function collectCarrierRates($carrierCode, $request)
    {
        if ($carrierCode === 'customshippingmethod') {
            $isElegible = true;

            // @todo get real values from parameter
            $helper = Mage::helper('customshippingmethod');
            $categoriesCustomShippingMethod = $helper->getCategoriesIdWithCustomShippingMethod();

            // echo "<pre>";
            // print_r($categoriesCustomShippingMethod);

            $cart = Mage::getModel('checkout/cart')->getQuote();

            foreach ($cart->getAllItems() as $item) {
                
                // We need to instantiate the product in order to get the custom attributes
                $product = Mage::getModel('catalog/product')->load($item->getProduct()->getId());
                $productIsCustomShippingMethod = $product->getData('apply_custom_shipping_method');
                $productCategories = $product->getCategoryIds();

                // echo "***" . $productIsCustomShippingMethod . "***";
                // die;
                
                // echo "<pre>";
                // print_r($productCategories);
                

                if(!$productIsCustomShippingMethod) {
                    // echo "product not shippable with custom shipping method";
                    // There is at least one product not shippable with Custom Shipping Method
                    return $this;
                }

                if(count(array_intersect($productCategories, $productIsCustomShippingMethod)) < 0) {
                    // echo "category not shippable with custom shipping method";
                    // There is at least one product with a category not shippable with Custom Shipping Method
                    return $this;
                }
            }

            // code never reached
            if(!$isElegible) {
                return $this;
            } else {
                return parent::collectCarrierRates($carrierCode, $request);
            }
        }
        
        return parent::collectCarrierRates($carrierCode, $request);
    }
}

// https://www.smartiehastheanswer.co.uk/magento/filtering-a-shipping-method-in-magento.html