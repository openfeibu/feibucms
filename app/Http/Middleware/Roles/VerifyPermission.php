<?php

namespace App\Http\Middleware\Roles;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Exceptions\Roles\PermissionDeniedException;

class VerifyPermission
{
    /**
     * @var \Illuminate\Interfaces\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param \Illuminate\Interfaces\Auth\Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param int|string $permission
     * @return mixed
     * @throws \App\Exceptions\Roles\PermissionDeniedException
     */
    public function handle($request, Closure $next, $permission)
    {
        if ($this->auth->check() && $this->auth->user()->can($permission)) {
            return $next($request);
        }

        throw new PermissionDeniedException($permission);
    }
}
