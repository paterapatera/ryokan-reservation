<?php

namespace App\Infra\Repositories\Employee;

use App\Domains\Employee\Employee;
use App\Domains\Employee\Id;
use App\Domains\Employee\Email;
use App\Domains\Employee\Repository;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InMemoryRepository implements Repository
{
    /** @var Collection<string, Employee> */
    public Collection $records;

    function __construct()
    {
        /** @var array<string, Employee> */
        $list = [];
        $this->records = collect($list);
    }

    function get(Id $id): Employee
    {
        return $this->records->get($id->value()) ?? throw new ModelNotFoundException();
    }

    function getByEmail(Email $email): Employee
    {
        return $this->records->first(fn ($m) => $m->email->value() === $email->value()) ?? throw new ModelNotFoundException();
    }

    function add(Employee $employee): void
    {
        $this->records->put($employee->id()->value(), $employee);
    }

    function update(Employee $employee): void
    {
        $this->get($employee->id());
        $this->records->put($employee->id()->value(), $employee);
    }

    function delete(Id $id): void
    {
        $this->records->forget($id->value());
    }
}
