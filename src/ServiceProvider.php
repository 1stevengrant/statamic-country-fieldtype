<?php

namespace Ghijk\CountryFieldtype;

use Ghijk\CountryFieldtype\Fieldtypes\CountrySelector;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        CountrySelector::class,
    ];

    protected $scripts = [
        __DIR__.'/../public/js/addon.js',
    ];
}
