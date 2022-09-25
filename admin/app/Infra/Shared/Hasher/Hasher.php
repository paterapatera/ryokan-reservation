<?php

namespace App\Infra\Shared\Hasher;

use App\Domains\Shared\Hasher as SharedHasher;
use App\Domains\Shared\PlainPassword;
use Illuminate\Support\Facades\Hash;

class Hasher implements SharedHasher
{
    function makePassword(PlainPassword $password): string
    {
        return Hash::make($password->value());
    }
}
