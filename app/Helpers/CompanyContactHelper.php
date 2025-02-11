<?php

namespace App\Helpers;

use App\Models\CompanyContact;

class CompanyContactHelper
{
    /**
     * Get the company contact details with fallbacks to environment variables.
     *
     * @return array
     */
    public static function getCompanyContact(): array
    {
        $companyContact = CompanyContact::first();

        return [
            'email_1' => $companyContact->email_1 ?? env('COMPANY_EMAIL_1'),
            'phone_1' => $companyContact->phone_1 ?? env('COMPANY_PHONE_1'),
            'email_2' => $companyContact->email_2 ?? null,
            'email_3' => $companyContact->email_3 ?? null,
            'email_4' => $companyContact->email_4 ?? null,
            'phone_2' => $companyContact->phone_2 ?? null,
            'phone_3' => $companyContact->phone_3 ?? null,
            'phone_4' => $companyContact->phone_4 ?? null,
            'address_1' => $companyContact->address_1 ?? env('ADDRESS_1'),
            'address_2' => $companyContact->address_2 ?? null,
            'address_3' => $companyContact->address_3 ?? null,
            'address_4' => $companyContact->address_4 ?? null,
            'facebook' => $companyContact->facebook ?? null,
            'instagram' => $companyContact->instagram ?? null,
            'linkedin' => $companyContact->linkedin ?? null,
            'youtube' => $companyContact->youtube ?? null,
        ];
    }
}
