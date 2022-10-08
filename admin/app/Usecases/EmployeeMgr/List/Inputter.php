<?php

namespace App\Usecases\EmployeeMgr\List;

interface Inputter {
    function run(InputData $inputData, Outputter $outputter): void;
}
