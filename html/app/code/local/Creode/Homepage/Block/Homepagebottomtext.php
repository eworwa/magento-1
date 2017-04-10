<?php
class Creode_Homepage_Block_Homepagebottomtext
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{

    protected function _toHtml()
    {
        // $text = $this->getData('text');
        // die;
        
        $text = $this->getData('text33');
        
		$html ='';
        // $html .= 'homepagebannerslide parameter1 = '.$this->getData('parameter1').'<br/>';
        // $html .= 'homepagebannerslide parameter2 = '.$this->getData('parameter2').'<br/>';
        // $html .= 'homepagebannerslide parameter3 = '.$this->getData('parameter3').'<br/>';
        // $html .= 'homepagebannerslide parameter4 = '.$this->getData('parameter4').'<br/>';
        // $html .= 'homepagebannerslide parameter5 = '.$this->getData('parameter5').'<br/>';

        $html .= '<div class="homepage-bottom-text"><p>' . $text . '</p></div>';
        return $html;
    }
	
}