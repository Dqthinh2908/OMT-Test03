<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Services\PermissionGateAndPolicyAccess;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();
        $permissionGateAndPolicy->setGateAndPolicyAccess();
    }
    //Categories
    public function defineGateCategory()
    {
        Gate::define('category_list','App\Policies\CategoryPolicy@view');
        Gate::define('category_add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category_edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category_delete','App\Policies\CategoryPolicy@delete');
    }

}
