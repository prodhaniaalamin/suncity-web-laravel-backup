<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RoleAccess
{
    use Helpers;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!role()) return Auth::check() ? redirect('/'): redirect('/login');

        $prefix = role()->prefix;
        self::$route = Route::currentRouteName();

        if (env('APP_MODE') === '6UPDATING7' && Route::currentRouteName() !== 'fees.index') {
            return redirect()->route('under.construction');
        }

        self::$currentAction = toObject(Route::current()->action);

        if ($prefix === request()->segment(1) && self::permissionCheck()) {
            return $next($request);
        }
        self::$prefix = $prefix;
        return redirect("{$prefix}/dashboard")->with('error', 'Permission denied.');
    }
}
