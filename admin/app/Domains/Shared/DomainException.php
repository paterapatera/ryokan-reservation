<?php

namespace App\Domains\Shared;

class DomainException extends \RuntimeException
{
    /**
     * @param class-string $className
     */
    function __construct(string $message, $className, int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct($message . $className, $code, $previous);
    }
}
