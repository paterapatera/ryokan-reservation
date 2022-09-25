<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

class WebController extends BaseController
{
    /**
     * @param array|\Illuminate\Contracts\Support\Arrayable<array-key, mixed> $props
     */
    function ok(?string $compnent = null, array|\Illuminate\Contracts\Support\Arrayable $props): \Inertia\ResponseFactory|\Inertia\Response
    {
        return inertia($compnent, $props);
    }

    function redirect(string $route, mixed $param, int $status): \Illuminate\Http\RedirectResponse
    {
        return Redirect::route($route, $param, $status);
    }
}
