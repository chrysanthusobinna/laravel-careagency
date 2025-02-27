<?php

namespace App\Helpers;

class UserHelper
{
    /**
     * Generate initials from first and last name.
     *
     * @param string $firstName
     * @param string $lastName
     * @return string
     */
    public static function getInitials(string $firstName, string $lastName): string
    {
        return strtoupper(substr($firstName, 0, 1) . substr($lastName, 0, 1));
    }

    /**
     * Format user role to a readable format.
     *
     * @param string $role
     * @return string
     */
    public static function formatUserRole(string $role): string
    {
        $roleMapping = [
            'admin_level_1' => 'Admin',
            'admin_level_2' => 'Admin',
            'care_giver' => 'Care Giver',
            'care_beneficiary' => 'Care Beneficiary',
        ];

        return $roleMapping[$role] ?? ucfirst(str_replace('_', ' ', $role));
    }
}
