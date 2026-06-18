<?php

namespace App\Bootstrap;

use Illuminate\Foundation\Bootstrap\HandleExceptions as BaseHandleExceptions;
use ErrorException;

class HandleExceptions extends BaseHandleExceptions
{
    /**
     * Report or log an exception.
     *
     * @param  int  $level
     * @param  string  $message
     * @param  string  $file
     * @param  int  $line
     * @param  array  $context
     * @return void
     *
     * @throws \ErrorException
     */
    public function handleError($level, $message, $file = '', $line = 0, $context = [])
    {
        // Suppress PHP deprecation warnings to compatibility with PHP 8.1+
        if ($level === E_DEPRECATED || $level === E_USER_DEPRECATED) {
            return;
        }

        if (error_reporting() & $level) {
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }
}
