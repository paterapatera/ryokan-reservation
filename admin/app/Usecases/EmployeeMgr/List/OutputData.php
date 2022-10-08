<?php

namespace App\Usecases\EmployeeMgr\List;

use App\Models\Employee;
use Illuminate\Support\Collection;

class OutputData {
    /**
     * @param Collection<int, Employee> $employees
     */
    function __construct(public Collection $employees) {
    }
}
