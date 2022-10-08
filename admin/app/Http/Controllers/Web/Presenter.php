<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Redirect;

class Presenter {
    /**
     * @param array|\Illuminate\Contracts\Support\Arrayable<array-key, mixed> $props
     */
    function ok(
        ?string $compnent = null,
        array|\Illuminate\Contracts\Support\Arrayable $props = [],
    ): \Inertia\ResponseFactory|\Inertia\Response {
        return inertia($compnent, $props);
    }

    function redirect(
        string $route,
        mixed $param,
        int $status = 303,
    ): \Illuminate\Http\RedirectResponse {
        return Redirect::route($route, $param, $status);
    }
}
