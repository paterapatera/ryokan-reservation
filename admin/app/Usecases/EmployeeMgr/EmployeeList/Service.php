<?php

namespace App\Usecases\EmployeeMgr\EmployeeList;

use App\Usecases\EmployeeMgr\EmployeeList\Actions\GetEmployees;

class Service
{
  function __construct(private GetEmployees $getEmployees)
  {
  }

  function run(): Output
  {
    return new Output($this->getEmployees->run());
  }
}
