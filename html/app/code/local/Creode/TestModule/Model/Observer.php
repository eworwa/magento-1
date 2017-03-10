<?php
class Creode_TestModule_Model_Observer
{

			public function incrementPrice(Varien_Event_Observer $observer)
			{
				$quote = $observer->getEvent()->getQuote();
	            $item = $observer->getQuoteItem();
	            $product_id=$item->getProductId();
	            $product=Mage::getModel('catalog/product')->load($product_id);

	            echo '<pre>';
	            print_r($product->getName());
	            print_r($product->getCategoriess());
	            exit;

				// Check for the product category and the setting catgory, if are the same apply the discount according to the other setting, and print a message



			}
		
}
