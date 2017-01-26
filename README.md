# Sparkify for Laravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is a simple package for sending transactional (triggered) emails via the [Spark Post](https://www.sparkpost.com/) REST Api.

## Install

Via Composer

``` bash
$ composer require brant-wladichuk/sparkify
```

## Usage

``` php
$user = \App\User::find(1);

$user->spark('template_id', [
    'foo' => 'bar'
])
```

## Setup

Add Service Provider to your app's config (config/app.php)

``` php
'providers' => [

    ...

    BrantWladichuk\Sparkify\SparkifyServiceProvider::class
];
```

Publish the configuration file and update it as required
``` bash
php artisan vendor:publish
```

Extend your user model with the Sparkable trait
``` php
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use BrantWladichuk\Sparkify\Sparkable;

class User extends Authenticatable
{
    use Notifiable, Sparkable;

    ...
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email brantwladichuk@gmail.com instead of using the issue tracker.

## Credits

- [Brant Wladichuk](https://github.com/BrantWladichuk)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/brant-wladichuk/sparkify.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/BrantWladichuk/Sparkify.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/BrantWladichuk/Sparkify.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/brant-wladichuk/sparkify.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/brant-wladichuk/sparkify
[link-scrutinizer]: https://scrutinizer-ci.com/g/BrantWladichuk/Sparkify/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/BrantWladichuk/Sparkify
[link-downloads]: https://packagist.org/packages/brant-wladichuk/sparkify
[link-author]: https://github.com/BrantWladichuk
