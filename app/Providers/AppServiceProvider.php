<?php
//testing branch
namespace App\Providers;

use App\Models\AcademicianGrant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function ($user) {
            return $user->userCategory === 'admin';
        });

        Gate::define('isStaff', function ($user) {
            return $user->userCategory === 'staff';
        });

        Gate::define('isAcademician', function ($user) {
            return $user->userCategory === 'academician';
        });

        Gate::define('viewGrants', function ($user) {
            return $user->userCategory === 'admin' || $user->userCategory === 'staff' || $user->userCategory === 'academician';
        });

        Gate::define('createAcademician', function ($user) {
            return $user->userCategory === 'admin';
        });

        Gate::define('createMilestone', function ($user) {
            return $user->userCategory === 'academician';
        });

        Gate::define('isProjectLeader', function ($user) {
            return $user->userCategory === 'academician' && $user->academicianGrants()->wherePivot('role', 'Project Leader')->exists();
        });

        Gate::define('viewAllGrants', function ($user) {
            return $user->userCategory === 'admin' || $user->userCategory === 'staff';
        });

        Gate::define('view-academicians', function ($user) {
            return in_array($user->role, ['admin', 'staff']);
        });
        

    }

    }