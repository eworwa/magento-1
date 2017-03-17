<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
CREATE TABLE `customers_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(250) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 