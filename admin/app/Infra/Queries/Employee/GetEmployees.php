<?php

namespace App\Infra\Queries\Employee;

use App\Usecases\EmployeeMgr\EmployeeList\Actions\GetEmployees as EmployeeListGetEmployees;
use App\Domains\Employee\Employee;
use App\Models\Employee as ModelEmployee;
use Illuminate\Support\Collection;

class GetEmployees implements EmployeeListGetEmployees
{
  /**
   * @return Collection<int, Employee>
   */
  function run(): Collection
  {
    return ModelEmployee::all()->map(fn (ModelEmployee $m): Employee => $m->toDomain());
  }
}
