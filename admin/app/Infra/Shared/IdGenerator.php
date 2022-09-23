<?php

namespace App\Infra\Shared;

use App\Domains\Shared\IdGenerator as SharedIdGenerator;
use Hidehalo\Nanoid\Client;

class IdGenerator implements SharedIdGenerator
{
    function generate(): string
    {
        return (new Client())->generateId();
    }
}
