<?php

namespace App\Domains\Shared;

use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

/**
 * @template T
 */
abstract class Entity implements Jsonable, JsonSerializable
{
    /**
     * @return T
     */
    abstract function id();

    /**
     * @param T $id
     */
    function same($id): bool
    {
        return $this->id() == $id;
    }

    abstract function jsonSerialize(): mixed;

    function toJson($options = 0): string
    {
        return json_encode($this, $options) ?: '';
    }
}
