<?php

namespace App\Usecases\EmployeeMgr\EmployeeList;

use App\Domains\Employee\Employee;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

/**
 * @implements Arrayable<int|string, mixed>
 */
class Output implements Arrayable
{
  /**
   * @param Collection<int, Employee> $employees
   */
  function __construct(public Collection $employees)
  {
  }

  function toArray()
  {
    return [
      'employees' => $this->employees
    ];
  }
}
