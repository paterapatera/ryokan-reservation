<?php

namespace App\Http\Controllers\Web\EmployeeMgr\List;

use App\Http\Controllers\BaseController;
use App\Usecases\EmployeeMgr\List\Inputter;

class Controller extends BaseController {
    function __invoke(
        Request $request,
        Response $response,
        Inputter $inputter,
    ): \Inertia\ResponseFactory|\Inertia\Response {
        $inputter->run($request->toInputData(), $response);
        return $response();
    }
}
