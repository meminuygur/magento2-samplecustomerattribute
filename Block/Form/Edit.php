<?php

namespace Bestresponsemedia\Customers\Block\Form;

use Magento\Customer\Block\Form\Edit as MagentoCustomerEdit;

/**
 * Class Edit
 * @package Bestresponsemedia\Customers\Block\Form
 * @author Mehmet Uygur <meminuygur@yandex.com>
 */
class Edit extends MagentoCustomerEdit
{

    /**
     * Get customer github Url
     *
     * @return string
     */
    public function getGithubUrl()
    {
        $customerGithubUrl = $this->getCustomer()->getCustomAttribute('github_url');
        return $customerGithubUrl ? $customerGithubUrl->getValue() : '';
    }
}