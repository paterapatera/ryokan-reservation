<?php

namespace App\Usecases\EmployeeMgr\EmployeeList;

use App\Usecases\EmployeeMgr\EmployeeList\Actions\EmployeesGetter;
use App\Models\Employee;
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

class Service
{
  function __construct(private EmployeesGetter $employeesGetter)
  {
  }

  function run(): Output
  {
    return new Output($this->employeesGetter->get());
  }
}
