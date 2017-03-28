<?php
$installer = $this;
$installer->startSetup();

// Add Category attribute
$installer->addAttribute("catalog_category", "apply_custom_shipping_method",  array(
    "type"     => "int",
    "backend"  => "",
    "frontend" => "",
    "label"    => "Eligible for custom shipping method",
    "input"    => "select",
    "class"    => "Shipping methods",
    "source"   => "eav/entity_attribute_source_boolean",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    "visible"  => true,
    "required" => true,
    "user_defined"  => false,
    "default" => "1",
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
    
    "visible_on_front"  => false,
    "unique"     => false,
    "note"       => ""

    ));

// Add Product attribute
$installer->addAttribute("catalog_product", "apply_custom_shipping_method",  array(
    "type"     => "int",
    "backend"  => "",
    "frontend" => "",
    "label"    => "Eligible for custom shipping method",
    "input"    => "select",
    "class"    => "Shipping methods",
    "source"   => "eav/entity_attribute_source_boolean",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    "visible"  => true,
    "required" => true,
    "user_defined"  => false,
    "default" => "1",
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
    
    "visible_on_front"  => false,
    "unique"     => false,
    "note"       => ""

    ));
$installer->endSetup();
     