<?php

namespace App\Lib\Exception;

use Throwable;

class RouterException extends \Exception
{
    public function __construct(string $message, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
