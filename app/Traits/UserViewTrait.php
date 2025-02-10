<?php

namespace App\Traits;

use App\Models\User;
use App\Helpers\UserHelper;  

trait UserViewTrait
{

    public function getUserById(int $id)
    {
        $user = User::findOrFail($id);

        // Add initials and formatted role using the helper functions
        $user->initials = UserHelper::getInitials($user->first_name, $user->last_name);
        $user->formatted_role = UserHelper::formatUserRole($user->role);

        return $user;
    }
}
