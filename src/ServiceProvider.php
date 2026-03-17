<?php

namespace Ghijk\CountryFieldtype;

use Ghijk\CountryFieldtype\Fieldtypes\CountrySelector;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        CountrySelector::class,
    ];
}
