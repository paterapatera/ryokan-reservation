<?php

namespace App\Usecases\EmployeeMgr\Show;

use App\Models\Employee;

class OutputData {
    function __construct(public Employee $employee) {
    }
}
