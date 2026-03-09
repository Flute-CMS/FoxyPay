<?php

namespace Omnipay\FoxyPay\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class PurchaseRequest extends AbstractRequest
{
    protected string $endpoint = 'https://foxypay.net/api/payment';

    public function getData(): array
    {
        $this->validate('amount', 'transactionId', 'returnUrl', 'notifyUrl');

        return [
            'amount'      => (int)($this->getAmount() * 100),
            'description' => $this->getDescription(),
            'webhook_url' => $this->getNotifyUrl(),
            'success_url' => $this->getReturnUrl(),
            'fail_url'    => $this->getReturnUrl(),
            'info'        => $this->getTransactionId(),
        ];
    }

    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            'POST',
            $this->endpoint,
            ['token' => $this->getSecret()],
            http_build_query($data)
        );

        $responseData = json_decode((string)$httpResponse->getBody(), true);

        if($responseData['success'] !== true) {
            throw new InvalidRequestException('Ошибка при создании платежа: ' . $responseData['err']);
        }

        return $this->response = new PurchaseResponse($this, $responseData);
    }
} 