<?php

namespace App\Usecases\Template;

class UseCase implements Inputter {
    function __construct() {
    }

    function run(InputData $inputData, Outputter $outputter): void {
        $outputter->output(new OutputData());
    }
}
