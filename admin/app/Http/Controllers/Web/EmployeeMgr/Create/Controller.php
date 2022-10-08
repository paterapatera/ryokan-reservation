<?php

namespace App\Http\Controllers\Web\EmployeeMgr\Create;

use App\Domains\Employee\Exception\DuplicateIdException;
use App\Http\Controllers\WebController;
use App\Usecases\EmployeeMgr\EmployeeCreate\Service;
use Illuminate\Validation\ValidationException;

class Controller extends WebController {
    function create(): \Inertia\ResponseFactory|\Inertia\Response {
        return inertia('EmployeeMgr/Create', []);
    }

    function store(Service $service, StoreRequest $request): \Illuminate\Http\RedirectResponse {
        try {
            $service->run($request->toInput());
        } catch (DuplicateIdException) {
            throw ValidationException::withMessages([
                'name' => '登録に失敗しました。再度お試しください。',
            ]);
        }

        return $this->redirect('employees.list', []);
    }
}
