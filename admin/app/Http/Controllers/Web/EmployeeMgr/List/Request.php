<?php

namespace App\Http\Controllers\Web\EmployeeMgr\List;

use App\Usecases\EmployeeMgr\List\InputData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest {
    public function rules(): array {
        return [];
    }

    function toInputData(): InputData {
        return new InputData();
    }
}
