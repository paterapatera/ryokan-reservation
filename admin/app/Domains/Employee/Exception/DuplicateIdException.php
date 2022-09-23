<?php

namespace App\Domains\Employee\Exception;

use App\Domains\Shared\DomainException;

class DuplicateIdException extends DomainException
{
    /**
     * @param class-string $className
     */
    function __construct($className, int $code = 0, \Throwable|null $previous = null)
    {
        parent::__construct('IDが重複しています', $className, $code, $previous);
    }
}
