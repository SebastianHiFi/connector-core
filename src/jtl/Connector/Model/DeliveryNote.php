<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage DeliveryNote
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * A delivery note created for shipment.
 *
 * @access public
 * @subpackage DeliveryNote
 */
class DeliveryNote extends DataModel
{
    /**
     * @var string - Open deliveryNote status (not processed or shipped yet)
     */
    const STATUS_OPEN = 'open';
    
    /**
     * @var string - DeliveryNote Status in progress (not shipped yet)
     */
    const STATUS_PROCESSING = 'processing';
    
    /**
     * @var status - DeliveryNote shipped / completed status
     */
    const STATUS_COMPLETED = completed;
    
    /**
     * @var Identity Unique deliveryNote id
     */
    protected $_id = null;
    
    /**
     * @var Identity Reference to customerOrder
     */
    protected $_customerOrderId = null;
    
    /**
     * @var string Optional text note
     */
    protected $_note = '';
    
    /**
     * @var string Creation date
     */
    protected $_created = null;
    
    /**
     * @var bool Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    protected $_isFulfillment = false;
    
    /**
     * @var int Delivery status
     */
    protected $_status = 0;
    
    /**
     * DeliveryNote Setter
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
                case "_customerOrderId":
                
                    $this->$name = ($value instanceof Identity) ? $value : null;
                    break;
            
                case "_note":
                case "_created":
                
                    $this->$name = (string)$value;
                    break;
            
                case "_isFulfillment":
                
                    $this->$name = (bool)$value;
                    break;
            
                case "_status":
                
                    $this->$name = (int)$value;
                    break;
            
            }
        }
    }
    
    /**
     * @param Identity $id Unique deliveryNote id
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setId(Identity $id)
    {
        $this->_id = $id;
        return $this;
    }
    
    /**
     * @return Identity Unique deliveryNote id
     */
    public function getId()
    {
        return $this->_id;
    }
    /**
     * @param Identity $customerOrderId Reference to customerOrder
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setCustomerOrderId(Identity $customerOrderId)
    {
        $this->_customerOrderId = $customerOrderId;
        return $this;
    }
    
    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId()
    {
        return $this->_customerOrderId;
    }
    /**
     * @param string $note Optional text note
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setNote($note)
    {
        $this->_note = (string)$note;
        return $this;
    }
    
    /**
     * @return string Optional text note
     */
    public function getNote()
    {
        return $this->_note;
    }
    /**
     * @param string $created Creation date
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setCreated($created)
    {
        $this->_created = (string)$created;
        return $this;
    }
    
    /**
     * @return string Creation date
     */
    public function getCreated()
    {
        return $this->_created;
    }
    /**
     * @param bool $isFulfillment Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setIsFulfillment($isFulfillment)
    {
        $this->_isFulfillment = (bool)$isFulfillment;
        return $this;
    }
    
    /**
     * @return bool Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    public function getIsFulfillment()
    {
        return $this->_isFulfillment;
    }
    /**
     * @param int $status Delivery status
     * @return \jtl\Connector\Model\DeliveryNote
     */
    public function setStatus($status)
    {
        $this->_status = (int)$status;
        return $this;
    }
    
    /**
     * @return int Delivery status
     */
    public function getStatus()
    {
        return $this->_status;
    }
}