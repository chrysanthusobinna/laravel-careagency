<?php

namespace App\Traits;

use App\Models\User;

trait GetUsersTrait
{
    /**
     * Get all users based on role.
     *
     * @param string $role
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersByRole(string $role)
    {
        $allowedRoles = ['admin_1', 'admin_2', 'care_giver', 'service_user'];
        
        if (!in_array($role, $allowedRoles)) {
            abort(400, 'Invalid role provided.');
        }

        return User::where('role', $role)->get();
    }
}
