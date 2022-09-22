<?php

namespace App\Domains\Shared;

class Email extends Text
{
    protected int $min = 1;
    protected int $max = 255;
    function __construct(public string $value)
    {
        parent::__construct($value);
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $maskValue = preg_replace('/[a-zA-Z_-]/', '*', $value);
            throw new DomainException("メールアドレスの形式が不正です($maskValue)", static::class);
        }
    }
}
