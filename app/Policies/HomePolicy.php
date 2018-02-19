<?php
/**
 * Home page policy
 */

namespace App\Policies;

use Illuminate\Support\Facades\Auth;

/**
 * Home Page Policy
 * @package App\Policies
 */
class HomePolicy
{
    /**
     * Check whether the current user is authenticated.
     *
     * @return bool
     */
    public function view()
    {
        return Auth::check();
    }
}
