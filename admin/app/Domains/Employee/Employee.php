<?php

namespace App\Domains\Employee;

use App\Domains\Shared\Entity;

/**
 * @extends Entity<Id>
 */
class Employee extends Entity
{
    function __construct(
        protected Id $id,
        public Name $name,
        public Email $email,
        public Password $password
    ) {
    }

    function id(): Id
    {
        return $this->id;
    }

    function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
