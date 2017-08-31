# Germania KG · UrlPrefixer

**Prefix any URL with a base URL, if not absolute or hashtagged “jump link”.**

[![Build Status](https://travis-ci.org/GermaniaKG/UrlPrefixer.svg?branch=master)](https://travis-ci.org/GermaniaKG/UrlPrefixer)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/UrlPrefixer/?branch=master)

## Installation

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



## Development and Testing

Develop using `develop` branch, using [Git Flow](https://github.com/nvie/gitflow).   

```bash
$ git clone git@github.com:GermaniaKG/UrlPrefixer.git urlprefixer
$ cd urlprefixer
$ cp phpunit.xml.dist phpunit.xml
$ phpunit
```
