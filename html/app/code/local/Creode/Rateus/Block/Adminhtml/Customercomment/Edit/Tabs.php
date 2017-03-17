<?php
class Creode_Rateus_Block_Adminhtml_Customercomment_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("customercomment_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("rateus")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("rateus")->__("Item Information"),
				"title" => Mage::helper("rateus")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("rateus/adminhtml_customercomment_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
