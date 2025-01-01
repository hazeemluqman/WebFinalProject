<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Grant;
use App\Models\Milestone;
use App\Models\Academician;
use App\Policies\GrantPolicy;
use App\Policies\MilestonePolicy;
use App\Policies\AcademicianPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Grant::class => GrantPolicy::class,
        Milestone::class => MilestonePolicy::class,
        Academician::class => AcademicianPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define additional Gates if needed
        Gate::define('manage-all', function ($user) {
            return $user->category === 'Admin';
        });

        Gate::define('view-grants', function (User $user) {
            // Allow Admins and iRMC Staff to view all grants
            if ($user->category === 'Admin' || $user->category === 'iRMC Staff' ||  $user->category === 'Project Leader') {
                return true;
            }

            // Allow Project Leaders to view only grants they lead
            return false;
        });

        Gate::define('manage-milestones', function (User $user) {
            return $user->category === 'Project Leader' || $user->category === 'Admin';
        });
    }
}