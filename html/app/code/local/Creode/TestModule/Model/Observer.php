<?php
class Creode_TestModule_Model_Observer
{

			public function incrementPrice(Varien_Event_Observer $observer)
			{
				// die('is working');
				// echo '<pre>' . print_r($observer) . '</pre>';
				// die;

				//$product = $observer->getEvent()->getData()->getControlleraction()->getCookie;
				$items = $observer->getEvent()->getItems();
				echo "<pre>";
				var_dump($items);
				exit;


				// echo $product->getName();

				// $cats = $product->getCategoryIds();
				// foreach ($cats as $category_id) {
				//     $_cat = Mage::getModel('catalog/category')->load($category_id) ;
				//     echo $_cat->getName();
				// }

				



			}
		
}
