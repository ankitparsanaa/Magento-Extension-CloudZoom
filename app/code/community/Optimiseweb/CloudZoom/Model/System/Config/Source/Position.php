<?php

/**
 * Optimiseweb CloudZoom Model System Config Source Position
 *
 * @package     Optimiseweb_CloudZoom
 * @author      Kathir Vel (sid@optimiseweb.co.uk)
 * @copyright   Copyright (c) 2014 Optimise Web
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Optimiseweb_CloudZoom_Model_System_Config_Source_Position
{

    protected $_options;

    public function toOptionArray()
    {
        if (!$this->_options) {
            $this->_options = array(
                    array(
                            'value' => 'left',
                            'label' => 'Left Side'
                    ),
                    array(
                            'value' => 'right',
                            'label' => 'Right Side'
                    ),
                    array(
                            'value' => 'top',
                            'label' => 'Top Side'
                    ),
                    array(
                            'value' => 'bottom',
                            'label' => 'Bottom Side'
                    ),
                    array(
                            'value' => 'inside',
                            'label' => 'Inside Original Image'
                    )
            );
        }
        return $this->_options;
    }

}
