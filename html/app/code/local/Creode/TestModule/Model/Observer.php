<?php
class Creode_TestModule_Model_Observer
{

			public function incrementPrice(Varien_Event_Observer $observer)
			{
				$quote = $observer->getEvent()->getQuote();
	            $item = $observer->getQuoteItem();
	            $product_id = $item->getProductId();
	            $product = Mage::getModel('catalog/product')->load($product_id);

	            $productCategories = $product->getCategoryIds();

	            $increasePriceCategoryId = Mage::getStoreConfig('price_handler_section/prince_handler_group/price_increment_category');
	            $increasePriceAmount = Mage::getStoreConfig('price_handler_section/prince_handler_group/price_increment');

	            // print_r($discountCategoryId);

	            foreach ($productCategories as $id => $categories) {
	            	if ($id == $discountCategoryId) {
	            		$currentPrice = $product->getPrice();
	            		$product->setPrice($currentPrice + $increasePriceAmount);
	            		$product->save();
	            		break;
	            	}
	            }

	            // echo "<pre>";
	            // print_r($product->getPrice());
	            // exit;
				
			}
		
}
