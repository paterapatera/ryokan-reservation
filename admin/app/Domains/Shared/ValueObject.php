<?php

namespace App\Domains\Shared;

use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

/**
 * @template T
 */
abstract class ValueObject implements Jsonable, JsonSerializable
{
    /**
     * @return T
     */
    abstract function value();

    function jsonSerialize(): mixed
    {
        return $this->value();
    }

    function toJson($options = 0): string
    {
        return json_encode($this, $options) ?: '';
    }
}
