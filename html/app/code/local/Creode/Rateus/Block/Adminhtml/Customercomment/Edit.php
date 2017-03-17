<?php
	
class Creode_Rateus_Block_Adminhtml_Customercomment_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "rateus";
				$this->_controller = "adminhtml_customercomment";
				$this->_updateButton("save", "label", Mage::helper("rateus")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("rateus")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("rateus")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("customercomment_data") && Mage::registry("customercomment_data")->getId() ){

				    return Mage::helper("rateus")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("customercomment_data")->getId()));

				} 
				else{

				     return Mage::helper("rateus")->__("Add Item");

				}
		}
}