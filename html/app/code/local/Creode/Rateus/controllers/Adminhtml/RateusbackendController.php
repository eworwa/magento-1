<?php
class Creode_Rateus_Adminhtml_RateusbackendController extends Mage_Adminhtml_Controller_Action
{

	protected function _isAllowed()
	{
		//return Mage::getSingleton('admin/session')->isAllowed('rateus/rateusbackend');
		return true;
	}

	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Customer comments"));
	   $this->renderLayout();
    }
}