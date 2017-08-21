# ampify

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This is a package to convert regular html ```<img>``` tags to those obligated by Google-Amp ```<amp-img>```.
This package is tested with ckeditor.


## Install

Via Composer

``` bash
$ composer require artka54/ampify:1.0.1
```

## Usage

``` php
use artka54\ampify\Ampify as Ampify;

$Ampify   = new Ampify($htmlToConvert);
$Ampified = $Ampify->ampifyImgs();
```

WARNING: 
Your img must contain src, style(indicating width and height) and alt (can be empty) attributes.
E.g a properly formatted img tag that can be successfuly converted with this package:
```html
<img alt="here is the alt" src="http://example.com/blahblah.png" style="height:599px; width:900px"> 
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

If you discover any security related issues, please email artka54@gmail.com instead of using the issue tracker.

## Credits

- [Arturs Kalnins][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/artka54/ampify.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/artka54/ampify/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/artka54/ampify.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/artka54/ampify.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/artka54/ampify.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/artka54/ampify
[link-travis]: https://travis-ci.org/artka54/ampify
[link-scrutinizer]: https://scrutinizer-ci.com/g/artka54/ampify/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/artka54/ampify
[link-downloads]: https://packagist.org/packages/artka54/ampify
[link-author]: https://github.com/artka54
[link-contributors]: ../../contributors
