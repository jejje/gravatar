# Gravatar
[![Build Status](https://travis-ci.org/jejje/gravatar.svg)](https://travis-ci.org/jejje/gravatar)
[![Total Downloads](https://poser.pugx.org/jejje/gravatar/downloads)](https://packagist.org/packages/jejje/gravatar) 
[![Latest Stable Version](https://poser.pugx.org/jejje/gravatar/v/stable)](https://packagist.org/packages/jejje/gravatar)
[![Latest Unstable Version](https://poser.pugx.org/jejje/gravatar/v/unstable)](https://packagist.org/packages/jejje/gravatar)
[![License](https://poser.pugx.org/jejje/gravatar/license)](https://packagist.org/packages/jejje/gravatar)

This package is part of a simple tutorial from [JejjE's network](http://jejje.net "JejjE's network") and
and will give you a few simple methods you can call to get a users Gravatar image. [Read the Tutorial here](http://jejje.net/create-your-own-laravel-5-package-part-1/)

## Installation
First you'll need to pull in the package via composer

```js
"require": {
    "jejje/gravatar": "dev-master"
}
```
And in your `app/config/app.php` you'll need to add the Service Provider.

```php
'providers' => [
    'Jejje\Gravatar\GravatarServiceProvider::class'
];
```

## Usage
You can use it either within your Controller or your View like so.
```php
public function index() {
    $email = 'jejje@jejje.net';
    $size = 100; // Optional, you may set a default in the config file
    Gravatar::getImageWithLinkToProfile($email, $size);
}
```
Other methods that are for your disposal are

- `Gravatar::getProfileUrl($email)`
- `Gravatar::getImageUrl($email, $size)`
- `Gravatar::getHash($email)`
