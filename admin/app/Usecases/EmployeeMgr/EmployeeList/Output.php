<?php

namespace App\Usecases\EmployeeMgr\EmployeeList;

use App\Domains\Employee\Employee;
use Illuminate\Support\Collection;

class Output
{
  /**
   * @param Collection<int, Employee> $employees
   */
  function __construct(public Collection $employees)
  {
  }
}
