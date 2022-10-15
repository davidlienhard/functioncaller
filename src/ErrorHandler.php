<?php declare(strict_types=1);

/**
 * containes error handler class
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\FunctionCaller;

use DavidLienhard\FunctionCaller\Error;

/**
 * a basic error handler that gets called from
 * phps set_error_handler()
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
class ErrorHandler
{
    /**
     * a numeric array containing all errors caught from the function
     * @var     array<\DavidLienhard\FunctionCaller\Error>
     */
    private array $allErrors = [];

    /** the last error caught from the function call */
    private Error|null $lastError = null;

    /**
     * handles the error passed from php and stores the errors
     *
     * @param       int     $errno      error number from php
     * @param       string  $errstr     error message
     * @param       string  $errfile    file in that the error has occurred
     * @param       int     $errline    line on that the error has occurred
     */
    public function handle(int $errno, string $errstr, string $errfile, int $errline) : bool
    {
        $error = new Error($errno, $errstr, $errfile, $errline);

        $this->lastError = $error;
        $this->allErrors[] = $error;

        return true;
    }

    /** returns the last error that occurred or null if no error occurred */
    public function getLastError() : Error|null
    {
        return $this->lastError;
    }

    /**
     * returns an array containing all errors that have occurred
     * if no errors have occurred the array will be empty
     * @return  array<\DavidLienhard\FunctionCaller\Error>
     */
    public function getAllErrors() : array
    {
        return $this->allErrors;
    }
}
