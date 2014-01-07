<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * ConfigGroup Model
 * Config group holds several configItems and settings
 *
 * @access public
 */
class ConfigGroup extends DataModel
{
    /**
     * @var string - Unique configGroup id
     */
    protected $_id = '';
    
    /**
     * @var string - Optional image file path
     */
    protected $_imagePath = '';
    
    /**
     * @var int - Optional minimum number required selections. Default 0 for no minimum requirement. 
     */
    protected $_minimumSelection = 0;
    
    /**
     * @var int - Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    protected $_maximumSelection = 0;
    
    /**
     * @var int - Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    protected $_type = 0;
    
    /**
     * @var int - Optional sort order number
     */
    protected $_sort = 0;
    
    /**
     * @var string - Optional internal comment to differantiate config groups by comment name
     */
    protected $_comment = '';
    
    /**
     * ConfigGroup Setter
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
                case "_imagePath":
                case "_comment":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_minimumSelection":
                case "_maximumSelection":
                case "_type":
                case "_sort":
                
                    $this->$name = (int)$value;
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