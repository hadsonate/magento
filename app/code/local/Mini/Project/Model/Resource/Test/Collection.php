<?php
class Mini_Project_Model_Resource_Test_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct(); // TODO: Change the autogenerated stub
        $this->_init('project/test');
    }
}