<?php

namespace Flute\Modules\FoxyPay\Listeners;

class PaymentListener
{
    public static function registerFoxyPay()
    {
        app()->getLoader()->addPsr4('Omnipay\\FoxyPay\\', module_path('FoxyPay', 'Omnipay/'));
        app()->getLoader()->register();
    }
} 