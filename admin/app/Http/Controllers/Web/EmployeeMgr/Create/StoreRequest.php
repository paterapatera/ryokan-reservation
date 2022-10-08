<?php

namespace App\Http\Controllers\Web\EmployeeMgr\Create;

use App\Usecases\EmployeeMgr\EmployeeCreate\Input;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:employees'],
            'password' => ['required', 'string', 'min:6', 'max:127'],
        ];
    }

    function toInput(): Input {
        $input = $this->all();
        return new Input($input['name'], $input['email'], $input['password']);
    }
}
