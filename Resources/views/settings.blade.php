@php
    $settings = $gateway ? $gateway->getSettings() : [];
    if (empty($settings)) {
        $settings = ['secret' => ''];
    }
@endphp

<x-forms.field>
    <x-forms.label for="settings__secret" required>Секретный ключ:</x-forms.label>
    <x-fields.input name="settings__secret" id="settings__secret" type="password"
        value="{{ request()->input('settings__secret', $settings['secret']) }}"
        placeholder="Вставьте сюда секретный ключ" required />
</x-forms.field> 