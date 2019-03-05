<?php

namespace Bestresponsemedia\Customers\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;

/**
 * Add github_url attribute for customer
 *
 * Class UpgradeData
 * @package Bestresponsemedia\Customers\Setup
 * @author Mehmet Uygur <meminuygur@yandex.com>
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * Constructor
     *
     * @param CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        if (version_compare($context->getVersion(), "0.0.1", "<")) {
            $customerSetup->addAttribute(Customer::ENTITY, 'github_url', [
                'type' => 'varchar',
                'label' => 'Github URL',
                'input' => 'text',
                'source' => '',
                'required' => true,
                'visible' => true,
                'position' => 100,
                'system' => false,
                'backend' => ''
            ]);
            
            $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'github_url')
            ->addData(['used_in_forms' => [
                    'adminhtml_customer',
                    'customer_account_create',
                    'customer_account_edit'
                ]
            ]);
            $attribute->save();
        }
    }
}
