# davidlienhard/functioncaller
🐘 php library to call functions and catch triggered errors

[![Latest Stable Version](https://img.shields.io/packagist/v/davidlienhard/functioncaller.svg?style=flat-square)](https://packagist.org/packages/davidlienhard/functioncaller)
[![Source Code](https://img.shields.io/badge/source-davidlienhard/functioncaller-blue.svg?style=flat-square)](https://github.com/davidlienhard/functioncaller)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/davidlienhard/functioncaller/blob/master/LICENSE)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.0-8892BF.svg?style=flat-square)](https://php.net/)
[![CI Status](https://github.com/davidlienhard/functioncaller/actions/workflows/check.yml/badge.svg)](https://github.com/davidlienhard/functioncaller/actions/workflows/check.yml)

## Setup

You can install through `composer` with:

```
composer require davidlienhard/functioncaller:^1
```

*Note: davidlienhard/functioncaller requires PHP 8.0*

## Example
```php
<?php declare(strict_types=1);

use DavidLienhard\FunctionCaller\Call as FunctionCaller;

$caller = new FunctionCaller("file", "testfile.txt");   // create caller instance
$result = $caller->getResult();                         // get result from call

if ($result === false) {                                // check if function has return false
    $errstr = $caller->getLastError()?->getErrstr();    // get error string
    $errno = $caller->getLastError()?->getErrno();      // get error number

    throw new \Exception("unable to read file 'testfile.php': ".$errstr." (".$errno.")");
}
```

## License

The MIT License (MIT). Please see [LICENSE](https://github.com/davidlienhard/functioncaller/blob/master/LICENSE) for more information.
