<?php

namespace Omnipay\FoxyPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\FoxyPay\Traits\Parametrable;

class Gateway extends AbstractGateway
{
    use Parametrable;

    public function getName(): string
    {
        return 'FoxyPay';
    }

    public function getDefaultParameters(): array
    {
        return ['secret' => ''];
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\\FoxyPay\\Message\\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\\FoxyPay\\Message\\CompletePurchaseRequest', $parameters);
    }
} 