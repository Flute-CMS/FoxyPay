<?php

namespace Omnipay\FoxyPay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isSuccessful(): bool
    {
        return isset($this->data['redirect_url']) && !empty($this->data['redirect_url']);
    }

    public function isRedirect(): bool
    {
        return $this->isSuccessful();
    }

    public function getRedirectUrl(): string
    {
        return $this->data['redirect_url'];
    }

    public function getRedirectMethod(): string
    {
        return 'GET';
    }

    public function getRedirectData(): ?array
    {
        return null;
    }
} 