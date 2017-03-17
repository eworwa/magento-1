<?php

class Creode_Rateus_Block_Adminhtml_Customercomment_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("customercommentGrid");
				$this->setDefaultSort("id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("rateus/customercomment")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("id", array(
				"header" => Mage::helper("rateus")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                
				$this->addColumn("comment", array(
				"header" => Mage::helper("rateus")->__("Comment"),
				"index" => "comment",
				));
					$this->addColumn('date', array(
						'header'    => Mage::helper('rateus')->__('Date'),
						'index'     => 'date',
						'type'      => 'datetime',
					));
				$this->addColumn("user_id", array(
				"header" => Mage::helper("rateus")->__("User Id"),
				"index" => "user_id",
				));
				$this->addColumn("user_name", array(
				"header" => Mage::helper("rateus")->__("User Name"),
				"index" => "user_name",
				));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('id');
			$this->getMassactionBlock()->setFormFieldName('ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_customercomment', array(
					 'label'=> Mage::helper('rateus')->__('Remove Customercomment'),
					 'url'  => $this->getUrl('*/adminhtml_customercomment/massRemove'),
					 'confirm' => Mage::helper('rateus')->__('Are you sure?')
				));
			return $this;
		}
			

}