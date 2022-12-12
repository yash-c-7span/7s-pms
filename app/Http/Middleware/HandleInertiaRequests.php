<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{

    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'flash' => [
                'error' => fn() => session()->get('flash.error'),
                'message' => fn() => session()->get('flash.message'),
            ],
        ]);
    }
}
