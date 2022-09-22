<?php

namespace App\Domains\Employee;

class Employee
{
  function __construct(
    public Id $id,
    public Name $name,
    public Email $email,
    public Password $password
  ) {
  }
}
