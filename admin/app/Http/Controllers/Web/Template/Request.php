<?php

namespace App\Http\Controllers\Web\Template;

use App\Usecases\Template\InputData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest {
    public function rules(): array {
        return [];
    }

    function toInputData(): InputData {
        return new InputData();
    }
}
