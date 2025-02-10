<?php

namespace App\Traits;

use App\Models\User;

trait UserListTrait
{
    /**
     * Get all users based on role and status.
     *
     * @param string $role
     * @return array
     */
    public function getUsersByRole(string $role)
    {
        $allowedRoles = ['admin_level_1', 'admin_level_2', 'care_giver', 'service_user'];
        
        if (!in_array($role, $allowedRoles)) {
            abort(400, 'Invalid role provided.');
        }

        $users = User::where('role', $role)->get();
        $activeCount = User::where('role', $role)->where('status', 1)->count();

        return [
            'users' => $users,
            'active_count' => $activeCount
        ];
    }
}
