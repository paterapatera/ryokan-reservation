<?php

namespace App\Domains\Employee;

use App\Domains\Shared\PlainPassword;
use App\Domains\Shared\IdGenerator;
use App\Domains\Shared\Hasher;

class Builder
{
    function __construct(
        private IdGenerator $idGenerator,
        private Hasher $hasher,
    ) {
    }

    function buildCreatableEmployee(
        Name $name,
        Email $email,
        PlainPassword $password,
    ): Employee {
        return new Employee(
            new Id($this->idGenerator->generate()),
            $name,
            $email,
            new Password($this->hasher->makePassword($password)),
        );
    }
}
