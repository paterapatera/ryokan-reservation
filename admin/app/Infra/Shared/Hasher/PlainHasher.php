<?php

namespace App\Infra\Shared\Hasher;

use App\Domains\Shared\Hasher as SharedHasher;
use App\Domains\Shared\PlainPassword;

class PlainHasher implements SharedHasher
{
    function makePassword(PlainPassword $password): string
    {
        return $password->value() . 'hash';
    }
}
