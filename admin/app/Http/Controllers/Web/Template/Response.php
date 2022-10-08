<?php

namespace App\Http\Controllers\Web\Template;

use App\Http\Controllers\Web\Presenter as WebPresenter;
use App\Usecases\Template\{Outputter, OutputData};

class Response extends WebPresenter implements Outputter {
    private array $viewModel;
    function output(OutputData $outputData): void {
        $this->viewModel = [];
    }

    function __invoke(): \Inertia\ResponseFactory|\Inertia\Response {
        return $this->ok('Template', $this->viewModel);
    }
}
