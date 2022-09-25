<?php

namespace App\Usecases\EmployeeMgr\EmployeeCreate;

use App\Domains\Employee\{Builder, Repository, Name, Email};
use App\Domains\Employee\PreCondition\WhenCreate;
use App\Domains\Shared\PlainPassword;

class Input
{
  public Name $name;
  public Email $email;
  public PlainPassword $password;

  function __construct(string $name, string $email, string $password,)
  {
    $this->name = new Name($name);
    $this->email = new Email($email);
    $this->password = new PlainPassword($password);
  }
}

class Service
{
  function __construct(
    private Builder $builder,
    private WhenCreate $preCondition,
    private Repository $repository
  ) {
  }

  function run(Input $input): void
  {
    $employee = $this->builder->buildCreatableEmployee(
      $input->name,
      $input->email,
      $input->password,
    );
    $this->preCondition->check($employee);
    $this->repository->add($employee);
  }
}
