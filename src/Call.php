<?php declare(strict_types=1);

/**
 * contains call class
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\FunctionCaller;

use DavidLienhard\FunctionCaller\Error;

/**
 * calls a given function with its parameters,
 * catches the errors and stores them
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
class Call
{
    /** result retured from the called function */
    private mixed $result;

    /**
     * a numeric array containing all errors caught from the function
     * @var     array<\DavidLienhard\FunctionCaller\Error>
     */
    private array $allErrors = [];

    /** the last error caught from the function call */
    private Error|null $lastError = null;

    /**
     * calls the given function and catches the errors
     * the function sets a custom error handler, calls the function
     * and then restores the error handler used so far
     *
     * it then fetches the errors from the error-handler instance
     *
     * @param   callable        $callable       function to call
     * @param   mixed           $arguments      arguments to pass into the function
     * @return  void
     */
    public function __construct(callable $callable, mixed ...$arguments)
    {
        $handler = new ErrorHandler;

        \set_error_handler([ $handler, "handle" ]);
        $this->result = \call_user_func($callable, ...$arguments);
        \restore_error_handler();

        $this->lastError = $handler->getLastError();
        $this->allErrors = $handler->getAllErrors();
    }

    /** returns the result returned from the called function */
    public function getResult(): mixed
    {
        return $this->result;
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
