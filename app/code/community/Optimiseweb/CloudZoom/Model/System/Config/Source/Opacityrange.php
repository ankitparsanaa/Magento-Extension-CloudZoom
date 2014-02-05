<?php

/**
 * Optimiseweb CloudZoom Model System Config Source OpacityRange
 *
 * @package     Optimiseweb_CloudZoom
 * @author      Kathir Vel (sid@optimiseweb.co.uk)
 * @copyright   Copyright (c) 2014 Optimise Web
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Optimiseweb_CloudZoom_Model_System_Config_Source_Opacityrange
{

    protected $_options;

    public function toOptionArray()
    {
        if (!$this->_options) {
            $this->_options = array();
            for ($i = 0; $i <= 1; $i+=0.1) {
                $this->_options[] = array(
                        'value' => ($i * 100),
                        'label' => $i
                );
            }
        }
        return $this->_options;
    }

}
