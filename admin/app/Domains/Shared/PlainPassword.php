<?php

namespace App\Domains\Shared;

class PlainPassword extends Text
{
    protected int $min = 6;
    protected int $max = 127;
    function __construct(public string $value)
    {
        parent::__construct($value);
        $reg = '[A-Za-z0-9\W_-]';
        if (!preg_match("/^{$reg}+$/", $value)) {
            $maskValue = preg_replace("/{$reg}/", '*', $value);
            throw new DomainException("パスワードに{$reg}以外の文字が使用されました($maskValue)", static::class);
        }
    }
}
