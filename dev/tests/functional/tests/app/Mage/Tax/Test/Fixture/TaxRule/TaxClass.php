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
 * @category    Tests
 * @package     Tests_Functional
 * @copyright Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license http://www.magento.com/license/enterprise-edition
 */

namespace Mage\Tax\Test\Fixture\TaxRule;

use Magento\Mtf\Fixture\FixtureFactory;
use Magento\Mtf\Fixture\FixtureInterface;

/**
 * Tax class source for TaxRule fixture.
 *
 * Data keys:
 *  - dataSet
 */
class TaxClass implements FixtureInterface
{
    /**
     * Array with tax class names.
     *
     * @var array
     */
    protected $data;

    /**
     * Array with tax class fixtures.
     *
     * @var array
     */
    protected $fixtures;

    /**
     * Source parameters.
     *
     * @var array
     */
    protected $params;

    /**
     * @constructor
     * @param FixtureFactory $fixtureFactory
     * @param array $params
     * @param array $data [optional]
     */
    public function __construct(FixtureFactory $fixtureFactory, array $params, array $data = [])
    {
        $this->params = $params;
        if (isset($data['dataSet'])) {
            foreach ($data['dataSet'] as $dataSet) {
                if ($dataSet !== '-') {
                    /** @var \Mage\Tax\Test\Fixture\TaxClass $taxClass */
                    $taxClass = $fixtureFactory->createByCode('taxClass', ['dataSet' => $dataSet]);
                    if (!$taxClass->hasData('id')) {
                        $taxClass->persist();
                    }
                    $this->fixtures[] = $taxClass;
                    $this->data[] = $taxClass->getClassName();
                }
            }
        }
    }

    /**
     * Persist custom selections tax classes
     *
     * @return void
     */
    public function persist()
    {
        //
    }

    /**
     * Return prepared data set
     *
     * @param $key [optional]
     * @return mixed
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function getData($key = null)
    {
        return $this->data;
    }

    /**
     * Return data set configuration settings
     *
     * @return string
     */
    public function getDataConfig()
    {
        return $this->params;
    }

    /**
     * Return tax class fixtures
     *
     * @return array
     */
    public function getFixtures()
    {
        return $this->fixtures;
    }
}
