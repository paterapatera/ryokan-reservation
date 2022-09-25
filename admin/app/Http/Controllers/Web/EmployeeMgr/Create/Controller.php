<?php

namespace App\Http\Controllers\Web\EmployeeMgr\Create;

use App\Domains\Employee\Exception\DuplicateIdException;
use App\Http\Controllers\WebController;
use App\Usecases\EmployeeMgr\EmployeeCreate\{Service, Input};
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Controller extends WebController
{
    function create(): \Inertia\ResponseFactory|\Inertia\Response
    {
        return inertia('EmployeeMgr/Create', []);
    }

    function store(Service $service, Request $request): \Illuminate\Http\RedirectResponse
    {
        /**
         * @var string $name
         * @var string $email
         * @var string $password
         */
        ['name' => $name, 'email' => $email, 'password' => $password] = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:employees'],
            'password' => ['required', 'string', 'min:6', 'max:127'],
        ]);

        try {
            $service->run(new Input($name, $email, $password));
        } catch (DuplicateIdException $e) {
            throw ValidationException::withMessages(['name' => '登録に失敗しました。再度お試しください。']);
        } catch (\Throwable $e) {
            dd($e);
        }

        return $this->redirect('employees.list', [], 303);
    }
}
