# Symfony Intervention image bundle
Symfony bundle for [Intervention Image](https://github.com/Intervention/image) - a PHP image handling and manipulation library.<br>
It supports Symfony 4.4, 5.x, 6.x and PHP 7.4+, 8.0.x, 8.1.x<br><br>
[![Unit Tests](https://github.com/janwebdev/symfony-intervention-image-bundle/actions/workflows/run-tests.yml/badge.svg)](https://github.com/janwebdev/symfony-intervention-image-bundle/actions/workflows/run-tests.yml)
[![Latest Stable Version](https://poser.pugx.org/janwebdev/symfony-intervention-image-bundle/v)](//packagist.org/packages/janwebdev/symfony-intervention-image-bundle) [![Total Downloads](https://poser.pugx.org/janwebdev/symfony-intervention-image-bundle/downloads)](//packagist.org/packages/janwebdev/symfony-intervention-image-bundle) [![Latest Unstable Version](https://poser.pugx.org/janwebdev/symfony-intervention-image-bundle/v/unstable)](//packagist.org/packages/janwebdev/symfony-intervention-image-bundle) [![License](https://poser.pugx.org/janwebdev/symfony-intervention-image-bundle/license)](//packagist.org/packages/janwebdev/symfony-intervention-image-bundle)
### Prerequisites
1. Installation
2. Enable the Bundle
3. Configuration
4. Basic usage
5. More info

### 1. Installation

**Using composer**

Run the composer to download the bundle:

``` bash
$ composer require janwebdev/translatable-entity-bundle
```

### 2. Enable the bundle

Check if bundle was enabled:

```php
<?php
// ./config/bundles.php

return [
    // ...
    Janwebdev\ImageBundle\ImageBundle::class => ['all' => true],
];
```

### 3. Configuration

Create config file, i.e.: `./config/packages/image.yaml` or copy-paste from [example](config.example.yaml).<br>
The configuration is as simple as

``` yml
intervention_image:
    driver: "gd" # or "imagick"
```
... and that's all!

### 4. Basic usage

inject new service `Janwebdev\ImageBundle\Image` in your code and start working with image.
```php
<?php
// ...
use Janwebdev\ImageBundle\Image;
// ...
public function processImage(Image $image)
{
    $pathToFile = "public/foo.jpg";
    $image->create($pathToFile)->resize(300, 200)->save('public/bar.jpg', 80);
    //or
    $img1 = $image->create(file_get_contents('public/foo.jpg'));
    //or
    $img2 = $image->create(imagecreatefromjpeg('public/foo.jpg'));
    //or
    $img3 = $image->create('http://example.com/example.jpg');
    $img3->crop(100, 100, 25, 25);
    $img3->save('public/baz.jpg', 60);
}
// ...
```

### 4. More info

For different image manipulations refer to **Intervention Image** [API documentation](https://image.intervention.io/v2) 

## Unit tests

``` bash
$ phpunit
```
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.