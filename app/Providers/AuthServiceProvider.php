<?php
/**
 * Authentication Service Provider
 */

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AuthServiceProvider
 * @package App\Providers
 */
class AuthServiceProvider extends ServiceProvider
{
    /** @var array The policy mappings for the application. */
    protected $policies = [
        'App\Http\Controllers\HomeController' => 'App\Policies\HomeControllerPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
