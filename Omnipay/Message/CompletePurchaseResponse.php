<?php

namespace Omnipay\FoxyPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful(): bool
    {
        return ($this->data['code'] ?? null) !== null;
    }

    public function getTransactionReference(): ?string
    {
        return $this->data['info'] ?? null;
    }

    public function getData(): array
    {
        return $this->data;
    }
}