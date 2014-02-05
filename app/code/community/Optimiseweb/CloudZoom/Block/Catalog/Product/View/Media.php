<?php

/**
 * Optimiseweb CloudZoom Block Catalog Product View Media
 *
 * @package     Optimiseweb_CloudZoom
 * @author      Kathir Vel (sid@optimiseweb.co.uk)
 * @copyright   Copyright (c) 2014 Optimise Web
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Optimiseweb_CloudZoom_Block_Catalog_Product_View_Media extends Mage_Catalog_Block_Product_View_Media
{

    /**
     *
     * @param type $name
     * @return type
     */
    public function getConfig($name)
    {
        return Mage::getStoreConfig('optimisewebcloudzoom/' . $name);
    }

    /**
     *
     * @return string
     */
    public function renderCloudOptions()
    {
        $output = "";
        $width = $this->getConfig('zoomImage/zoomWidth');
        if (empty($width) || !is_numeric($width)) {
            $width = 'auto';
        }
        $height = $this->getConfig('zoomImage/zoomHeight');
        if (empty($height) || !is_numeric($height)) {
            $height = 'auto';
        }
        $output .= "zoomWidth: '" . $width . "',";
        $output .= "zoomHeight: '" . $height . "',";
        $output .= "position: '" . $this->getConfig('zoomImage/position') . "',";
        $output .= "smoothMove: " . (int) $this->getConfig('zoomImage/smoothMove') . ",";
        $output .= "showTitle: " . ($this->getConfig('zoomImage/showTitle') ? 'true' : 'false') . ",";
        $output .= "titleOpacity: " . (float) ($this->getConfig('zoomImage/titleOpacity') / 100) . ",";

        $adjustX = (int) $this->getConfig('zoomImage/adjustX');
        $adjustY = (int) $this->getConfig('zoomImage/adjustY');
        if ($adjustX > 0) {
            $output .= "adjustX: " . $adjustX . ",";
        }
        if ($adjustY > 0) {
            $output .= "adjustY: " . $adjustY . ",";
        }

        $output .= "lensOpacity: " . (float) ($this->getConfig('originalImage/lensOpacity') / 100) . ",";

        $tint = $this->getConfig('originalImage/tint');
        if (!empty($tint)) {
            $output .= "tint: '" . $this->getConfig('originalImage/tint') . "',";
        }
        $output .= "tintOpacity: " . (float) ($this->getConfig('originalImage/tintOpacity') / 100) . ",";
        $output .= "softFocus: " . ($this->getConfig('originalImage/softFocus') ? 'true' : 'false') . "";

        return $output;
    }

    /**
     *
     * @param type $name
     * @return type
     */
    public function imageWidth()
    {

        if ($this->getConfig('originalImage/imageWidth')) {
            return $this->getConfig('originalImage/imageWidth');
        } else {
            return '300';
        }
    }

    /**
     *
     * @param type $name
     * @return type
     */
    public function imageHeight()
    {
        if ($this->getConfig('originalImage/imageHeight')) {
            return $this->getConfig('originalImage/imageHeight');
        } else {
            return '300';
        }
    }

    /**
     *
     * @param type $product
     * @param type $imageFile
     * @return type
     */
    public function getFullImage($product, $imageFile = null)
    {
        $fullImageUrl = $this->helper('catalog/image')->init($product, 'image', $imageFile);
        // If Image Zooming is disabled
        if ($this->getConfig('general/disableImageZoom') == 1) {
            return $this->getCloudImage($product, $imageFile);
        }
        // If Smaller Images Zoom is disabled
        if ($this->getConfig('general/disableSmallImageZoom') == 1) {
            $fullImagePath = Mage::getBaseDir() . str_replace("/", DS, strstr($fullImageUrl, '/media'));
            if (file_exists($fullImagePath)) {
                $imageObj = new Varien_Image($fullImagePath);
                $imageWidth = $imageObj->getOriginalWidth();
                $imageHeight = $imageObj->getOriginalHeight();
            }
            if (($imageWidth < $this->imageWidth()) AND ($imageHeight < $this->imageHeight())) {
                return $this->getCloudImage($product, $imageFile);
            }
        }
        return $fullImageUrl;
    }

    /**
     *
     * @param type $product
     * @param type $imageFile
     * @return type
     */
    public function getCloudImage($product, $imageFile = null)
    {
        $image = $this->helper('catalog/image')->init($product, 'image', $imageFile);

        $width = $this->getConfig('originalImage/imageWidth');
        $height = $this->getConfig('originalImage/imageHeight');

        if (!empty($width) && !empty($height)) {
            return $image->resize($width, $height);
        } else if (!empty($width)) {
            return $image->resize($width);
        } else if (!empty($height)) {
            return $image->resize($height);
        }
        return $image;
    }

    /**
     *
     * @param type $name
     * @return type
     */
    public function thumbnailWidth()
    {
        if ($this->getConfig('gallery/thumbnailwidth')) {
            return $this->getConfig('gallery/thumbnailwidth');
        } else {
            return '50';
        }
    }

    /**
     *
     * @param type $name
     * @return type
     */
    public function thumbnailHeight()
    {
        if ($this->getConfig('gallery/thumbnailheight')) {
            return $this->getConfig('gallery/thumbnailheight');
        } else {
            return '50';
        }
    }

    /**
     *
     * @param type $product
     * @param type $imageFile
     * @return type
     */
    public function getGalleryImage($product, $imageFile)
    {
        $image = $this->helper('catalog/image')->init($product, 'image', $imageFile);

        $width = $this->thumbnailWidth();
        $height = $this->thumbnailHeight();

        if (!empty($width) && !empty($height)) {
            return $image->resize($width, $height);
        } else if (!empty($width)) {
            return $image->resize($width);
        } else if (!empty($height)) {
            return $image->resize($height);
        }
        return $image;
    }

    /**
     *
     * @return boolean
     */
    public function sliderJcarouselEnable()
    {
        if ($this->getConfig('slider/type') == 'jcarousel') {
            return TRUE;
        }
        return FALSE;
    }

    /**
     *
     * @return boolean
     */
    public function sliderFlexsliderEnable()
    {
        if ($this->getConfig('slider/type') == 'flexslider') {
            return TRUE;
        }
        return FALSE;
    }

    /**
     *
     * @return type
     */
    public function sliderOptions()
    {
        if ($this->getConfig('slider/options')) {
            return $this->getConfig('slider/options');
        }
        return;
    }

}
