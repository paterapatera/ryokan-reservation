<?php

namespace App\Usecases\Template;

interface Outputter {
    function output(OutputData $output): void;
}
