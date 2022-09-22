<?php

namespace App\Domains\Shared;

class Id extends Text
{
    protected int $min = 21;
    protected int $max = 21;
    function __construct(public string $value)
    {
        parent::__construct($value);
        if (!preg_match('/^[A-Za-z0-9_-]+$/', $value)) {
            throw new DomainException("IDに[A-Za-z0-9_-]以外の文字が使用されました($value)", static::class);
        }
    }
}
