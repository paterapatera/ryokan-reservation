<?php

namespace App\Usecases\EmployeeMgr\EmployeeCreate;

use App\Domains\Employee\{Builder, Repository};
use App\Domains\Employee\PreCondition\WhenCreate;

class Service {
    function __construct(
        private Builder $builder,
        private WhenCreate $preCondition,
        private Repository $repository,
    ) {
    }

    function run(Input $input): void {
        $employee = $this->builder->buildCreatableEmployee(
            $input->name,
            $input->email,
            $input->password,
        );
        $this->preCondition->check($employee);
        $this->repository->add($employee);
    }
}
