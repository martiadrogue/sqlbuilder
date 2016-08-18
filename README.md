# SQL Builder

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Make great SQL tasks dynamically. Return a Select statement from a chain of
responsibilities pattern and some "with" methods to cover all paths of the
select.

## Install

Via Composer

``` json
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/martiadrogue/sqlbuilder.git"
    }
],
"require": {
    "martiadrogue/sqlbuilder": "dev-devel"
},
```

## Usage

``` php
$skeleton = new MartiAdrogue\SqlBuilder();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email
marti.adrogue@gmail.com instead of using the issue tracker.

## Credits

-   [Martí Adrogué][link-author]
-   [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/martiadrogue/sqlbuilder.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/martiadrogue/sqlbuilder/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/martiadrogue/sqlbuilder.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/martiadrogue/sqlbuilder.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/martiadrogue/sqlbuilder.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/martiadrogue/sqlbuilder
[link-travis]: https://travis-ci.org/martiadrogue/sqlbuilder
[link-scrutinizer]: https://scrutinizer-ci.com/g/martiadrogue/sqlbuilder/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/martiadrogue/sqlbuilder
[link-downloads]: https://packagist.org/packages/martiadrogue/sqlbuilder
[link-author]: https://github.com/martiadrogue
[link-contributors]: ../../contributors
