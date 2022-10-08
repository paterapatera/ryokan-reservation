<?php

namespace App\Usecases\EmployeeMgr\Show;

use App\Usecases\EmployeeMgr\Show\Actions\EmployeeGetter;

class UseCase implements Inputter {
    function __construct(private EmployeeGetter $employeeGetter) {
    }

    function run(InputData $inputData, Outputter $outputter): void {
        $employee = $this->employeeGetter->get($inputData->id);
        $outputter->output(new OutputData($employee));
    }
}
