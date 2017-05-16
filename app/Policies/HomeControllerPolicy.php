<?php
/**
 * Home Controller Policy
 */

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

/**
 * Home Page Controller Policy
 * @package App\Policies
 */
class HomeControllerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the controller.
     *
     * @return bool true = can view, false = cannot view
     */
    public function view()
    {
        return Auth::check();
    }
}
