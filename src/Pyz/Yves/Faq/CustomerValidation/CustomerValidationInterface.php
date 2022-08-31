<?php

namespace Pyz\Yves\Faq\CustomerValidation;

interface CustomerValidationInterface
{
    /**
     * @return bool
     */
    public function isCustomerLogged(): bool;
}
