<?php

namespace App\Usecases\EmployeeMgr\Show;

interface Outputter {
    function output(OutputData $output): void;
}
