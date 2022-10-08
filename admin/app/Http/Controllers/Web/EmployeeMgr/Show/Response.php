<?php

namespace App\Http\Controllers\Web\EmployeeMgr\Show;

use App\Http\Controllers\Web\Presenter as WebPresenter;
use App\Usecases\EmployeeMgr\Show\{Outputter, OutputData};
use RuntimeException;

class Response extends WebPresenter implements Outputter {
    private array $viewModel;
    function output(OutputData $outputData): void {
        $this->viewModel = [
            'employee' => [
                'id' => $outputData->employee->id ?? throw new RuntimeException('id'),
                'name' => $outputData->employee->name ?? throw new RuntimeException('name'),
            ],
        ];
    }

    function __invoke(): \Inertia\ResponseFactory|\Inertia\Response {
        return $this->ok('EmployeeMgr/Show', $this->viewModel);
    }
}
