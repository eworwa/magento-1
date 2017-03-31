<?php
class Creode_CustomShippingMethod_Helper_Data extends Mage_Core_Helper_Abstract
{
	function getCategoriesIdWithCustomShippingMethod() {
		$categoriesId = array();

		$categories = Mage::getModel('catalog/category')
                    ->getCollection()
                    ->addAttributeToSelect('*')
                    ->addFieldToFilter('apply_custom_shipping_method', 1)
                    ->addIsActiveFilter();

        foreach ($categories as $id => $category) {
        	$categoriesId[] = $id;
        }

		return $categoriesId;
	}
}
	 