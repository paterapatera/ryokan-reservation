<?php

namespace App\Http\Controllers\Web\EmployeeMgr\List;

use App\Http\Controllers\WebController;
use App\Usecases\EmployeeMgr\EmployeeList\EmployeeListService;

class Controller extends WebController
{
    function __invoke(EmployeeListService $employeeListService): \Inertia\ResponseFactory|\Inertia\Response
    {
        $output = $employeeListService->run();
        return inertia('EmployeeMgr/List', [
            'employees' => $output->employees
        ]);
    }
}
