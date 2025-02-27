<?php

namespace App\Traits;

use App\Models\User;
use App\Helpers\UserHelper;  

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
        $allowedRoles = ['admin_level_1', 'admin_level_2', 'care_giver', 'care_beneficiary'];
    
        if (!in_array($role, $allowedRoles)) {
            abort(400, 'Invalid role provided.');
        }
    
        // Get all users with the specified role
        $users = User::where('role', $role)->get();
    
        // Count all users with the role
        $totalCount = $users->count();
    
        // Count only active users with the role
        $activeCount = $users->where('status', 1)->count();
    
        return [
            'users' => $users,
            'total_count' => $totalCount,
            'active_count' => $activeCount
        ];
    }
    
}
