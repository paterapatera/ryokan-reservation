<?php

namespace App\Infra\Repositories\Employee;

use App\Domains\Employee\Employee;
use App\Domains\Employee\Id;
use App\Domains\Employee\Email;
use App\Domains\Employee\Repository;
use App\Models\Employee as Model;

class EloquentRepository implements Repository
{
    function get(Id $id): Employee
    {
        return Model::findOrFail($id->value())->toDomain();
    }

    function getByEmail(Email $email): Employee
    {
        return Model::where('email', $email->value())->firstOrFail()->toDomain();
    }

    function add(Employee $employee): void
    {
        Model::create([
            'id' => $employee->id()->value(),
            'name' => $employee->name->value(),
            'email' => $employee->email->value(),
            'password' => $employee->password->value(),
        ]);
    }

    function update(Employee $employee): void
    {
        /** @var Model */
        $model = Model::findOrFail($employee->id()->value());
        $model->update([
            'name' => $employee->name->value(),
            'email' => $employee->email->value(),
            'password' => $employee->password->value(),
        ]);
    }

    function delete(Id $id): void
    {
        Model::destroy($id->value());
    }
}
