<?php
/**
 * Content Page Policy
 */

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

/**
 * Home Page Policy
 * @package App\Policies
 */
class ContentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view content page.
     *
     * @return bool true = can view, false = cannot view
     */
    public function view()
    {
        return Auth::check();
    }
}
