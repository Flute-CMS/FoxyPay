<?php

namespace Omnipay\FoxyPay\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;

abstract class AbstractRequest extends OmnipayAbstractRequest
{
    use \Omnipay\FoxyPay\Traits\Parametrable;
} 