<?php

namespace App\Usecases\EmployeeMgr\Show\Actions;

use App\Models\Employee;

class EmployeeGetter {
    function get(string $id): Employee {
        return Employee::findOrFail($id);
    }
}
