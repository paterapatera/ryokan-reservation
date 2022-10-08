<?php

namespace App\Http\Controllers\Web\EmployeeMgr\Show;

use App\Http\Controllers\Web\Presenter as WebPresenter;
use App\Usecases\EmployeeMgr\Show\{Outputter, OutputData};

class Response extends WebPresenter implements Outputter {
    private array $viewModel;
    function output(OutputData $outputData): void {
        $this->viewModel = [
            'employee' => [
                'id' => $outputData->employee->id,
                'name' => $outputData->employee->name,
            ],
        ];
    }

    function __invoke(): \Inertia\ResponseFactory|\Inertia\Response {
        return $this->ok('EmployeeMgr/Show', $this->viewModel);
    }
}
