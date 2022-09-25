<?php

namespace App\Http\Controllers\Web\EmployeeMgr\List;

use App\Http\Controllers\WebController;
use App\Usecases\EmployeeMgr\EmployeeList\Service;

class Controller extends WebController
{
    function __invoke(Service $employeeListService): \Inertia\ResponseFactory|\Inertia\Response
    {
        $output = $employeeListService->run();

        return $this->ok('EmployeeMgr/List', [
            'employees' => $output->employees
        ]);
    }
}
