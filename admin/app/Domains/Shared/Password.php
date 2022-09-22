<?php

namespace App\Domains\Shared;

class Password extends Text
{
    protected int $min = 1;
    protected int $max = 255;
}
