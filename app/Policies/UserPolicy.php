<?php
/**
 * User Policy
 */

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

/**
 * User Policy
 * @package App\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view his/her profile.
     *
     * @return bool true = can view, false = cannot view
     */
    public function view()
    {
        return Auth::check();
    }
}