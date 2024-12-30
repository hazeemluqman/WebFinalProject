<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Grant;
use Illuminate\Auth\Access\HandlesAuthorization;

class GrantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can view any grants.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'admin' || $user->role === 'irmc_staff'; // Admin or iRMC staff can view all grants
    }

    /**
     * Determine if the user can view a specific grant.
     */
    public function view(User $user, Grant $grant)
    {
        return $user->role === 'admin' || $user->role === 'project_leader' && $grant->project_leader_id === $user->id;
    }

    /**
     * Determine if the user can create a grant.
     */
    public function create(User $user)
    {
        return $user->role === 'admin'; // Only admin can create a grant
    }

    /**
     * Determine if the user can update the grant.
     */
    public function update(User $user, Grant $grant)
    {
        return $user->role === 'admin' || ($user->role === 'project_leader' && $grant->project_leader_id === $user->id);
    }

    /**
     * Determine if the user can delete the grant.
     */
    public function delete(User $user, Grant $grant)
    {
        return $user->role === 'admin'; // Only admin can delete a grant
    }
}