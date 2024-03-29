<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition End User License Agreement
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magento.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Unserialize
 * @package     Unserialize_Reader
 * @copyright Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license http://www.magento.com/license/enterprise-edition
 */

/**
 * Class Unserialize_Reader_Dbl
 */
class Unserialize_Reader_Dbl
{
    /**
     * @var int
     */
    protected $_status;

    /**
     * @var string|int
     */
    protected $_value;

    const READING_VALUE = 1;

    /**
     * @param string $char
     * @param string $prevChar
     * @return float|null
     */
    public function read($char, $prevChar)
    {
        if ($prevChar == Unserialize_Parser::SYMBOL_COLON) {
            $this->_value .= $char;
            $this->_status = self::READING_VALUE;
            return null;
        }

        if ($this->_status == self::READING_VALUE) {
            if ($char !== Unserialize_Parser::SYMBOL_SEMICOLON) {
                $this->_value .= $char;
            } else {
                return (float)$this->_value;
            }
        }
        return null;
    }
}
