<?php

namespace App\Domains\Shared;

interface IdGenerator
{
    function generate(): string;
}
