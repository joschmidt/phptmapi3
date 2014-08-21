# PHPTMAPI 3

PHPTMAPI 3 is the succession project of http://phptmapi.sourceforge.net/ 

PHPTMAPI is a PHP5 API for creating and manipulating topic maps, based on the http://tmapi.sourceforge.net/ project.
This API enables PHP developers an easy and standardized implementation of ISO/IEC 13250 Topic Maps in their applications.

## What is TMAPI?

TMAPI is a programming interface for accessing and manipulating data held in a topic map. The TMAPI specification defines a set of core interfaces which must be implemented by a compliant application as well as (eventually) a set of additional interfaces which may be implemented by a compliant application or which may be built upon the core interfaces. 

## Design Objectives in PHPTMAPI 3
* Do not change the  API
* Introduce namespaces
* Follow [PSR-0](http://www.php-fig.org/psr/psr-0/) (autoloading standard), [PSR-1](http://www.php-fig.org/psr/psr-1/) (basic coding standard), and [PSR-2](http://www.php-fig.org/psr/psr-2/) (coding style guide)
* Install via [composer](https://getcomposer.org/) and get autoloading for free

## Fetch and Install

Use [composer](https://getcomposer.org/) and get autoloading for free.

Create a `composer.json` file for your project:

```JSON
{
    "require": {
        "phptmapi3/phptmapi3": "dev-master"
    }
}
```
Run these two commands to install it:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install

Add the autoloader and you will have access to Phptmapi3:

```php
<?php
require 'vendor/autoload.php';
```
Create your implementation of PHPTMAPI. Add the namespace and class name of your implementation of  `TopicMapSystemFactory` in `Phptmapi3/config.php`. Example:
```php
<?php

/*
 * PHPTMAPI is hereby released into the public domain; 
 * and comes with NO WARRANTY.
 * 
 * No one owns PHPTMAPI: you may use it freely in both commercial and
 * non-commercial applications, bundle it with your software
 * distribution, include it on a CD-ROM, list the source code in a
 * book, mirror the documentation at your own web site, or use it in
 * any other way you see fit.
 */

$factoryImplementation = '\Foo\Core\TopicMapSystemFactoryImpl';
```

Add your namespace to `composer.json`. Example:

```JSON
{
    "require": {
        "phptmapi3/phptmapi3": "dev-master"
    },
    "autoload": {
        "psr-0": {
            "Foo\\": "src/"
        }
    }
}
```
Finally, create an instance of your implementation of `TopicMapSystemFactory`:

```php
<?php
require 'vendor/autoload.php';

try {
    $topicMapSystemFactory = \Phptmapi3\Core\TopicMapSystemFactory::newInstance();
    // create a topic map system, then topic maps, topics, etc.
} catch (\Phptmapi3\Core\FactoryConfigurationException $e) {
    print $e->getMessage();
}
```

## Documentation

Read a paper about TMAPI 2.0: http://tmra.de/2008/talks/tmapi-2.html

Generate an API documentation e.g. using http://phpdoc.org/ or have a look at http://phptmapi.sourceforge.net/2.1/docs/ which is still valid on API level.

## License

Public Domain (see LICENSE)
