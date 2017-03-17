<?php

class Creode_Rateus_Adminhtml_CustomercommentController extends Mage_Adminhtml_Controller_Action
{
		protected function _isAllowed()
		{
		//return Mage::getSingleton('admin/session')->isAllowed('rateus/customercomment');
			return true;
		}

		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("rateus/customercomment")->_addBreadcrumb(Mage::helper("adminhtml")->__("Customercomment  Manager"),Mage::helper("adminhtml")->__("Customercomment Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("Rateus"));
			    $this->_title($this->__("Manager Customercomment"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Rateus"));
				$this->_title($this->__("Customercomment"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("rateus/customercomment")->load($id);
				if ($model->getId()) {
					Mage::register("customercomment_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("rateus/customercomment");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Customercomment Manager"), Mage::helper("adminhtml")->__("Customercomment Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Customercomment Description"), Mage::helper("adminhtml")->__("Customercomment Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("rateus/adminhtml_customercomment_edit"))->_addLeft($this->getLayout()->createBlock("rateus/adminhtml_customercomment_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("rateus")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Rateus"));
		$this->_title($this->__("Customercomment"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("rateus/customercomment")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("customercomment_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("rateus/customercomment");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Customercomment Manager"), Mage::helper("adminhtml")->__("Customercomment Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Customercomment Description"), Mage::helper("adminhtml")->__("Customercomment Description"));


		$this->_addContent($this->getLayout()->createBlock("rateus/adminhtml_customercomment_edit"))->_addLeft($this->getLayout()->createBlock("rateus/adminhtml_customercomment_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("rateus/customercomment")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Customercomment was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setCustomercommentData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setCustomercommentData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("rateus/customercomment");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("rateus/customercomment");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'customercomment.csv';
			$grid       = $this->getLayout()->createBlock('rateus/adminhtml_customercomment_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'customercomment.xml';
			$grid       = $this->getLayout()->createBlock('rateus/adminhtml_customercomment_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
