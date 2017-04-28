<?php
/**
 * Home Controller Policy
 */

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeControllerPolicy
 * @package App\Policies
 */
class HomeControllerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the controller.
     *
     * @return bool
     */
    public function view()
    {
        return Auth::check();
    }
}
