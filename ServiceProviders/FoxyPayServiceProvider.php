<?php

namespace Flute\Modules\FoxyPay\ServiceProviders;

use Flute\Core\Support\ModuleServiceProvider;
use Flute\Core\Modules\Payments\Events\RegisterPaymentFactoriesEvent;
use Flute\Core\Modules\Payments\Factories\PaymentDriverFactory;
use Flute\Modules\FoxyPay\Omnipay\FoxyPayDriver;
use Flute\Modules\FoxyPay\Listeners\PaymentListener;

class FoxyPayServiceProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        $this->bootstrapModule();
        $this->loadViews('Resources/views', 'flute-foxypay');
        app(PaymentDriverFactory::class)->register('FoxyPay', FoxyPayDriver::class);
        events()->addDeferredListener(RegisterPaymentFactoriesEvent::NAME, [PaymentListener::class, 'registerFoxyPay']);
    }

    public function register(\DI\Container $container): void {}
} 