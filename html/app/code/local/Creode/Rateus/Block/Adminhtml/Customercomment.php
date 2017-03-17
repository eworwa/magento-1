<?php


class Creode_Rateus_Block_Adminhtml_Customercomment extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_customercomment";
	$this->_blockGroup = "rateus";
	$this->_headerText = Mage::helper("rateus")->__("Customercomment Manager");
	$this->_addButtonLabel = Mage::helper("rateus")->__("Add New Item");
	parent::__construct();
	
	}

}