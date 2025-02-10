<?php

namespace App\Traits;

use App\Models\User;

trait UserViewTrait
{
    /**
     * Retrieve a user by ID.
     *
     * @param int $id
     * @return User
     */
    public function getUserById(int $id)
    {
        return User::findOrFail($id);
    }
}
