<?php
class Creode_Homepage_Block_Homepageimagead
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{

    protected function _toHtml()
    {
        $imagePath = Mage::getBaseUrl('media') . $this->getImage1();
        $title = $this->getData('title1');
        
		$html ='';
        // $html .= 'homepagebannerslide parameter1 = '.$this->getData('parameter1').'<br/>';
        // $html .= 'homepagebannerslide parameter2 = '.$this->getData('parameter2').'<br/>';
        // $html .= 'homepagebannerslide parameter3 = '.$this->getData('parameter3').'<br/>';
        // $html .= 'homepagebannerslide parameter4 = '.$this->getData('parameter4').'<br/>';
        // $html .= 'homepagebannerslide parameter5 = '.$this->getData('parameter5').'<br/>';

        // $html = $this->getData('title') . ' - ' . $this->getData('text');
        $html .= '<img src="' . $imagePath . '" alt="' .$title . '" title="' .$title . '" />';
        return $html;
    }
	
}