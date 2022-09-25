<?php

namespace App\Usecases\EmployeeMgr\EmployeeList\Actions;

use App\Models\Employee;
use Illuminate\Support\Collection;

class EmployeesGetter
{
  /**
   * @return Collection<int, Employee>
   */
  function get(): Collection
  {
    return Employee::all();
  }
}
