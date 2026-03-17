# Statamic Country (ISO 3166) Dropdown Fieldtype

![Statamic 6.0+](https://img.shields.io/badge/Statamic-6.0+-FF269E?style=for-the-badge&link=https://statamic.com)

The simplest way to list every country as a selectable dropdown.

## Features

- Display a select field with every **ISO 3166-1 alpha-2** country code.
- Built-in **localization** powered by Symfony Intl (all ICU locales supported).
- Set a **placeholder**.
- Allow **multiple selections**.
- Set a **maximum number of selectable items**.
- Enable **searching** through options.

## Requirements

- PHP 8.3+
- Statamic 6.0+

## Installation

```bash
composer require ghijk/statamic-country-fieldtype
```

You can also follow the [official Statamic addon installation guide](https://statamic.dev/addons#installing-addons).

## Usage

Add the **Country** fieldtype to your blueprint. The fieldtype stores ISO 3166-1 alpha-2 country codes (e.g. `US`, `GB`, `NL`).

In your templates, the country name is returned in the current locale:

```antlers
{{ country }}
```

To get the raw country code:

```antlers
{{ country:value }}
```

## Localization

Country names are automatically displayed in the current application locale, based on `App::getLocale()`. All locales supported by PHP's ICU data are available.

## Changelog

**V2.0.0**
Upgraded to Statamic 6. Moved country data from JavaScript to PHP via `symfony/intl`, removing the need for any JS build step.

**V1.0.0**
Initial release.
