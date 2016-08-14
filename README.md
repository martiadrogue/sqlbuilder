# SqlBuilder

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Make greate SQL tasks dynamically.

http://www.babyearth.com/
http://www.petitlem.com/
http://www.walmart.com/cp/Baby-Products/5427
http://www.buybuybaby.com/store/category/clearance-savings/30010/
http://www.giggle.com/
http://www.potterybarnkids.com/shop/baby/
http://www.target.com/c/baby/-/N-5xtly
http://www.carters.com/carters-baby
https://pure-ecommerce.com/online-baby-boutique-website-for-sale
http://www.diapers.com/
https://www.quora.com/Are-baby-e-commerce-sites-successful
http://inpics.net/tutorials/mysql/security4.html

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
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email marti.adrogue@gmail.com instead of using the issue tracker.

## Credits

- [Martí Adrogué][link-author]
- [All Contributors][link-contributors]

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

## NOTES

I found an issue when I was trying to update my dependencies.

```shell
composer update
Cannot create cache directory /home/marti/.composer/cache/repo/https---packagist.org/, or directory is not writable. Proceeding without cache
Cannot create cache directory /home/marti/.composer/cache/files/, or directory is not writable. Proceeding without cache
Cannot create cache directory /home/marti/.composer/cache/repo/https---packagist.org/, or directory is not writable. Proceeding without cache
```

Solution:

```shell
sudo chown -R $USER $HOME/.composer/
```
