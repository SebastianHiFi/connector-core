<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * CustomerGroup Model
 * Customer group settings
 *
 * @access public
 */
class CustomerGroup extends DataModel
{
    /**
     * @var string - Unique id
     */
    protected $_id = "0";
    
    /**
     * @var string - Customer group name
     */
    protected $_name = '';
    
    /**
     * @var double - Percentual discount on all products. Negative Value means surcharge. 
     */
    protected $_discount = 0.0;
    
    /**
     * @var bool - Flag default customer group
     */
    protected $_isDefault = false;
    
    /**
     * @var bool - Show net prices default instead of gross prices
     */
    protected $_applyNetPrice = False;
    
    /**
     * CustomerGroup Setter
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
                case "_id":
                case "_name":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_discount":
                
                    $this->$name = (double)$value;
                    break;
            
                case "_isDefault":
                case "_applyNetPrice":
                
                    $this->$name = (bool)$value;
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