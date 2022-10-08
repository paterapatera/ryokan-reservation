<?php

namespace App\Usecases\EmployeeMgr\List;

interface Outputter {
    function output(OutputData $outputData): void;
}
