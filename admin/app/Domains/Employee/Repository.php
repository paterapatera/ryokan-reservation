<?php

namespace App\Domains\Employee;

interface Repository
{
  function get(Id $id): Employee;
  function getByEmail(Email $email): Employee;
  function add(Employee $employee): void;
  function update(Employee $employee): void;
  function delete(Id $id): void;
}
