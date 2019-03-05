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
     * @return mixed
     */
    public function getGithubUrl()
    {
        return $this->getCustomer()->getCustomAttribute('github_url')->getValue();
    }
}