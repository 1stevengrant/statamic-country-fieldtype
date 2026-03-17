<?php

namespace Ghijk\CountryFieldtype\Fieldtypes;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Statamic\Fields\LabeledValue;
use Statamic\Fieldtypes\Select;
use Symfony\Component\Intl\Countries;

class CountrySelector extends Select
{
    protected $icon = 'earth';

    protected $categories = ['text'];

    public static function title()
    {
        return __('Country');
    }

    public function preload(): array
    {
        return [
            'options' => $this->getCountryOptions(),
        ];
    }

    public function augment($value)
    {
        if (is_null($value)) {
            return null;
        }

        $locale = App::getLocale();

        if ($this->config('multiple')) {
            return collect(Arr::wrap($value))
                ->map(fn (string $code) => $this->augmentValue($code, $locale))
                ->all();
        }

        return $this->augmentValue($value, $locale);
    }

    protected function configFieldItems(): array
    {
        return [
            'placeholder' => [
                'display' => __('Placeholder'),
                'instructions' => __('statamic::fieldtypes.select.config.placeholder'),
                'type' => 'text',
                'default' => '',
                'width' => 50,
            ],
            'multiple' => [
                'display' => __('Multiple'),
                'instructions' => __('statamic::fieldtypes.select.config.multiple'),
                'type' => 'toggle',
                'default' => false,
                'width' => 50,
            ],
            'max_items' => [
                'display' => __('Max Items'),
                'instructions' => __('statamic::messages.max_items_instructions'),
                'type' => 'integer',
                'width' => 50,
            ],
            'searchable' => [
                'display' => __('Searchable'),
                'instructions' => __('statamic::fieldtypes.select.config.searchable'),
                'type' => 'toggle',
                'default' => true,
                'width' => 50,
            ],
        ];
    }

    private function getCountryOptions(): array
    {
        $locale = App::getLocale();

        return collect(Countries::getNames($locale))
            ->map(fn (string $name, string $code) => [
                'label' => $name,
                'value' => $code,
            ])
            ->values()
            ->all();
    }

    private function augmentValue(string $code, string $locale): LabeledValue
    {
        try {
            $label = Countries::getName($code, $locale);
        } catch (\Exception) {
            $label = $code;
        }

        return new LabeledValue($code, $label);
    }
}
