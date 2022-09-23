<?php

namespace App\Domains\Employee\PreCondition;

use App\Domains\Employee\Employee;
use App\Domains\Employee\Exception\DuplicateEmailException;
use App\Domains\Employee\Exception\DuplicateIdException;
use App\Domains\Employee\Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WhenCreate
{
    function __construct(
        private Repository $repository,
    ) {
    }

    function check(Employee $employee): void
    {
        $this->throwIfDuplicateId($employee);
        $this->throwIfDuplicateEmail($employee);
    }

    private function throwIfDuplicateId(Employee $employee): void
    {
        try {
            $this->repository->get($employee->id());
            throw new DuplicateIdException(static::class);
        } catch (ModelNotFoundException $e) {
            // 取得できなければ重複していない
        }
    }

    private function throwIfDuplicateEmail(Employee $employee): void
    {
        try {
            $this->repository->getByEmail($employee->email);
            throw new DuplicateEmailException(static::class);
        } catch (ModelNotFoundException $e) {
            // 取得できなければ重複していない
        }
    }
}
