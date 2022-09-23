<?php

namespace App\Domains\Shared;

class Password extends Text
{
    protected int $min = 1;
    protected int $max = 255;

    function jsonSerialize(): mixed
    {
        throw new DomainException('パスワードが予期せず出力されています。', static::class);
    }
}
