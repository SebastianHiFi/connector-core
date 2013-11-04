<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ProductVariationValueDependency Model
 * 
 *
 * @access public
 */
class ProductVariationValueDependency extends DataModel
{
    /**
     * @var string
     */
    protected $_productVariationValueId = "0";
    
    /**
     * @var string
     */
    protected $_productVariationValueTargetId = "0";
    
    /**
     * ProductVariationValueDependency Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            if ($value === null) {
                $this->$name = null;
                return;
            }
        
            switch ($name) {
                case "_productVariationValueId":
                case "_productVariationValueTargetId":
                
                    $this->$name = (string)$value;
                    break;
            
            }
        }
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>