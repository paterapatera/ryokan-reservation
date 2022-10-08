<?php

namespace App\Usecases\Template;

interface Inputter {
    function run(InputData $inputData, Outputter $outputter): void;
}
