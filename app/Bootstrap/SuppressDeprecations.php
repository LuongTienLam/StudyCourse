<?php

namespace App\Bootstrap;

use Illuminate\Contracts\Foundation\Application;

class SuppressDeprecations
{
    public function bootstrap(Application $app)
    {
        // Suppress deprecation warnings by registering a custom error handler that ignores them
        // and delegates other errors to the previous handler (Laravel's handler)
        $previousHandler = set_error_handler(function ($level, $message, $file = '', $line = 0) use (&$previousHandler) {
            if ($level === E_DEPRECATED || $level === E_USER_DEPRECATED) {
                return true; // Ignore deprecation warnings
            }
            if ($previousHandler) {
                return call_user_func($previousHandler, $level, $message, $file, $line);
            }
            return false;
        });
    }
}
