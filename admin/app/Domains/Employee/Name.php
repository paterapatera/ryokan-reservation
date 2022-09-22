<?php

namespace App\Domains\Employee;

use App\Domains\Shared\Text;

class Name extends Text
{
  protected int $min = 1;
  protected int $max = 255;
}
