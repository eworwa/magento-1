<?php
class Creode_Rateus_Block_Adminhtml_Customercomment_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);

				$users = Mage::getModel('customer/customer')->getCollection()
				   ->addAttributeToSelect('firstname')
				   ->addAttributeToSelect('lastname')
				   ->addAttributeToSelect('entity_id');

				$usersArray = array();

				foreach ($users as $key => $user) {
					$usersArray[$user->getId()] = $user->getName();
				}

				$fieldset = $form->addFieldset("rateus_form", array("legend"=>Mage::helper("rateus")->__("Comment Details")));

				
						$fieldset->addField("comment", "text", array(
								"label" => Mage::helper("rateus")->__("Comment"),					
								"class" => "required-entry",
								"required" => true,
								"name" => "comment",
								)
							);

						$fieldset->addField("user_id", "select", array(
								"label" => "User",
								"class" => "required-entry",
								"required" => true,
								"name" => "user_id",
								"options" => $usersArray,
								)
							);
					

				if (Mage::getSingleton("adminhtml/session")->getCustomercommentData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getCustomercommentData());
					Mage::getSingleton("adminhtml/session")->setCustomercommentData(null);
				} 
				elseif(Mage::registry("customercomment_data")) {
				    $form->setValues(Mage::registry("customercomment_data")->getData());
				}
				return parent::_prepareForm();
		}
}
