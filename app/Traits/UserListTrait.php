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
        $allowedRoles = ['admin_level_1', 'admin_level_2', 'care_giver', 'service_user'];

        if (!in_array($role, $allowedRoles)) {
            abort(400, 'Invalid role provided.');
        }

        $users = User::where('role', $role)->get();

        // Modify user object to include initials and formatted role
        $users = $users->map(function ($user) {
            $user->initials = UserHelper::getInitials($user->first_name, $user->last_name);
            $user->formatted_role = UserHelper::formatUserRole($user->role);
            return $user;
        });

        $activeCount = User::where('role', $role)->where('status', 1)->count();

        return [
            'users' => $users,
            'active_count' => $activeCount
        ];
    }
}
