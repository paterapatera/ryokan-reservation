<?php

namespace App\Usecases\EmployeeMgr\Show;

interface Inputter {
    function run(InputData $inputData, Outputter $outputter): void;
}
