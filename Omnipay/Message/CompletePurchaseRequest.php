<?php

namespace Omnipay\FoxyPay\Message;

class CompletePurchaseRequest extends AbstractRequest
{
    public function getData(): array
    {
        return json_decode($this->httpRequest->getContent(), true) ?? [];
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}