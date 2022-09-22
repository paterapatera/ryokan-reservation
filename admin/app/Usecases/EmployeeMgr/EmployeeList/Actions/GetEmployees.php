<?php

namespace App\Usecases\EmployeeMgr\EmployeeList\Actions;

use App\Domains\Employee\Employee;
use Illuminate\Support\Collection;

interface GetEmployees
{
  /**
   * @return Collection<int, Employee>
   */
  function run(): Collection;
}
