<?php

namespace App\Http\Controllers\Web\Template;

use App\Http\Controllers\BaseController;
use App\Usecases\Template\Inputter;

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
