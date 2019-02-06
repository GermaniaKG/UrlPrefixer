# Germania KG · UrlPrefixer

**Prefix any URL with a base URL, if not absolute or hashtagged “jump link”.**


[![Packagist](https://img.shields.io/packagist/v/germania-kg/urlprefixer.svg?style=flat)](https://packagist.org/packages/germania-kg/urlprefixer)
[![PHP version](https://img.shields.io/packagist/php-v/germania-kg/urlprefixer.svg)](https://packagist.org/packages/germania-kg/urlprefixer)
[![Build Status](https://img.shields.io/travis/GermaniaKG/UrlPrefixer.svg?label=Travis%20CI)](https://travis-ci.org/GermaniaKG/UrlPrefixer)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/build-status/master)


## Installation with Composer

```bash
$ composer require germania-kg/urlprefixer
```


## Usage

```php
<?php
use Germania\UrlPrefixer\UrlPrefixer;

// Your prefix, normally a 'base URL'
$prefixer = new UrlPrefixer( 'https://myapp.com/project' );

echo $prefixer('/index.html');
// Result: "https://myapp.com/project/index.html"

// If URL is absolute, nothing happens:
echo $prefixer('//dist/styles.css');
// Result: "//dist/styles.css"

// If URL is hashtagged, nothing happens as well:
echo $prefixer('#navigation');
// Result: "#navigation"


```

### Custom URL prefixes

You may pass a second parameter to the Callable to override the default prefix you set with on instantiation:

```php
<?php
// Your prefix, normally a 'base URL'
$prefixer = new UrlPrefixer( 'https://myapp.com/project' );

echo $prefixer('/logo.jpg', 'https://cdn.test.com');
// Result: "https://cdn.test.com/logo.jpg"

// Like above, nothing happens when URL is absolute:
echo $prefixer('//dist/styles.css', 'https://cdn.test.com');
// Result: "//dist/styles.css"
```

## Issues

See [issues list.][i0]

[i0]: https://github.com/GermaniaKG/UrlPrefixer/issues 

## Development

```bash
$ git clone https://github.com/GermaniaKG/UrlPrefixer.git
$ cd UrlPrefixer
$ composer install
```

## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. Run [PhpUnit](https://phpunit.de/) test or composer scripts like this:

```bash
$ composer test
# or
$ vendor/bin/phpunit
```

