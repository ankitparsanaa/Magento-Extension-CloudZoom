<?php

/**
 * Optimiseweb CloudZoom Model System Config Source Carouseltype
 *
 * @package     Optimiseweb_CloudZoom
 * @author      Kathir Vel (sid@optimiseweb.co.uk)
 * @copyright   Copyright (c) 2014 Optimise Web
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Optimiseweb_CloudZoom_Model_System_Config_Source_Carouseltype
{

    protected $_options;

    public function toOptionArray()
    {
        if (!$this->_options) {
            $this->_options = array(
                    array(
                            'value' => 'none',
                            'label' => 'No Slider'
                    ),
                    array(
                            'value' => 'flexslider',
                            'label' => 'FlexSlider'
                    ),
                    array(
                            'value' => 'jcarousel',
                            'label' => 'jCarousel'
                    ),
            );
        }
        return $this->_options;
    }

}
