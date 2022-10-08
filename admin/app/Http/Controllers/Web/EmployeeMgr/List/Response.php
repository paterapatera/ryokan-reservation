<?php

namespace App\Http\Controllers\Web\EmployeeMgr\List;

use App\Http\Controllers\Web\Presenter as WebPresenter;
use App\Usecases\EmployeeMgr\List\{Outputter, OutputData};

class Response extends WebPresenter implements Outputter {
    private array $viewModel;
    function output(OutputData $outputData): void {
        $employees = $outputData->employees->map(
            fn($v) => [
                'id' => $v->id,
                'name' => $v->name,
            ],
        );
        $this->viewModel = [
            'employees' => $employees,
        ];
    }

    function __invoke(): \Inertia\ResponseFactory|\Inertia\Response {
        return $this->ok('EmployeeMgr/List', $this->viewModel);
    }
}
