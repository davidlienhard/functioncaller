# davidlienhard/functioncaller
🐘 php library to call functions and catch triggered errors

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
