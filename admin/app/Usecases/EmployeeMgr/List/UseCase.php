<?php

namespace App\Usecases\EmployeeMgr\List;

use App\Usecases\EmployeeMgr\List\Actions\EmployeesGetter;

class UseCase implements Inputter {
    function __construct(private EmployeesGetter $employeesGetter) {
    }

    function run(InputData $inputData, Outputter $outputter): void {
        $outputter->output(new OutputData($this->employeesGetter->get()));
    }
}
