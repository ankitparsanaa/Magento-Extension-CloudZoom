<?php

/**
 * Optimiseweb CloudZoom Model System Config Source Smoothmove
 *
 * @package     Optimiseweb_CloudZoom
 * @author      Kathir Vel (sid@optimiseweb.co.uk)
 * @copyright   Copyright (c) 2014 Optimise Web
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Optimiseweb_CloudZoom_Model_System_Config_Source_Smoothmove
{

    protected $_options;

    public function toOptionArray()
    {
        if (!$this->_options) {
            $this->_options = array();
            for ($i = 1; $i <= 10; $i++) {
                $this->_options[] = array(
                        'value' => $i,
                        'label' => $i
                );
            }
        }
        return $this->_options;
    }

}
