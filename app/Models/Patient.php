<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'address',
        'phone_number',
        'email_address',
        'emergency_contact_name',
        'emergency_contact_phone',
        'insurance_company_name',
        'insurance_policy_number',
        'primary_care_physician',
        'medical_history',
        'allergies',
        'medications',
        'family_medical_history',
        'occupation',
        'marital_status',
        'ethnicity',
        'preferred_language',
        'religion',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
