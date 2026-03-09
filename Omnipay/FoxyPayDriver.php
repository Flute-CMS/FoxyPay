<?php

namespace Flute\Modules\FoxyPay\Omnipay;

use Flute\Core\Modules\Payments\Drivers\AbstractOmnipayDriver;

class FoxyPayDriver extends AbstractOmnipayDriver
{
    public ?string $adapter = 'FoxyPay';
    public ?string $name = 'FoxyPay';
    public ?string $settingsView = 'flute-foxypay::settings';

    public function getValidationRules(): array
    {
        return [
            'settings__secret' => ['required','string','max-str-len:255'],
        ];
    }
} 