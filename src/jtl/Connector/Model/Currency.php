<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Currency Model
 * @access public
 */
class Currency extends DataModel
{
    /**
     * @var int
     */
    protected $_id;
    
    /**
     * @var string
     */
    protected $_name;
    
    /**
     * @var string
     */
    protected $_iso;
    
    /**
     * @var string
     */
    protected $_nameHtml;
    
    /**
     * @var double
     */
    protected $_factor;
    
    /**
     * @var bool
     */
    protected $_isDefault = False;
    
    /**
     * @var bool
     */
    protected $_hasCurrencySignBeforeValue = False;
    
    /**
     * @var string
     */
    protected $_delimiterCent = ",";
    
    /**
     * @var string
     */
    protected $_delimiterThousand = ".";
    
    /**
     * Currency Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_id":
            
                $this->$name = (int)$value;
                break;
        
            case "_name":
            case "_iso":
            case "_nameHtml":
            case "_delimiterCent":
            case "_delimiterThousand":
            
                if (is_string($value) && strlen(trim($value)) > 0) {
                    $this->$name = (string)$value;
                }
                break;
        
            case "_factor":
            
                $this->$name = (double)$value;
                break;
        
            case "_isDefault":
            case "_hasCurrencySignBeforeValue":
            
                if (is_bool($value)) {
                    $this->$name = (bool)$value;
                }
                break;
        
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