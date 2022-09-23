<?php

namespace App\Domains\Shared;

interface Hasher
{
    function makePassword(PlainPassword $password): string;
}
