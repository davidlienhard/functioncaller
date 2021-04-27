<?php
/**
 * contains error class
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

declare(strict_types=1);

namespace DavidLienhard\FunctionCaller;

/**
 * contains all the information to an error
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
class Error
{
    /**
     * expects the information from the ErrorHandler and stores them
     *
     * @param       int     $errno      error number from php
     * @param       string  $errstr     error message
     * @param       string  $errfile    file in that the error has occurred
     * @param       int     $errline    line on that the error has occurred
     * @return      void
     */
    public function __construct(
        private int $errno,
        private string $errstr,
        private string $errfile,
        private int $errline
    ) {
    }

    /** returns the error number */
    public function getErrno() : int
    {
        return $this->errno;
    }

    /** returns the error mesage */
    public function getErrstr() : string
    {
        return $this->errstr;
    }

    /** returns the error file */
    public function getErrfile() : string
    {
        return $this->errfile;
    }

    /** returns the error line */
    public function getErrline() : int
    {
        return $this->errline;
    }

    /**
     * returns the error as an associative array
     * with the following structure
     * [
     *      'errno'   => $errno,
     *      'errstr'  => $errstr,
     *      'errfile' => $errfile,
     *      'errline' => $errline,
     * ]
     */
    public function getAsArray() : array
    {
        return [
            "errno"   => $this->errno,
            "errstr"  => $this->errstr,
            "errfile" => $this->errfile,
            "errline" => $this->errline,
        ];
    }
}
