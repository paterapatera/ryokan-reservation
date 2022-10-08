<?php

namespace App\Http\Controllers\Web\EmployeeMgr\Show;

use App\Usecases\EmployeeMgr\Show\InputData;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest {
    public function rules(): array {
        return [];
    }

    function toInputData(): InputData {
        $id = strval($this->route('id'));
        return new InputData($id);
    }
}
