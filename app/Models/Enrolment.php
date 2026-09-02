<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrolment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'application_number',
        'status',
        'current_step',

        // Step 1
        'declaration_1',
        'declaration_2',
        'declaration_3',
        'declaration_4',

        // Step 2
        'prefix',
        'first_name',
        'middle_name',
        'family_name',
        'full_legal_name',
        'preferred_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',

        // Residential
        'building_name',
        'unit_number',
        'street_number',
        'street_name',
        'suburb',
        'postcode',
        'country',
        'state',

        // Postal
        'postal_address',
        'postal_unit',
        'postal_street_number',
        'postal_street_name',
        'postal_suburb',
        'postal_postcode',
        'postal_country',
        'postal_state',

        // Step 3
        'born',
        'other_birth_country',
        'language',
        'other_language',
        'indigenous',
        'disability',

        // School
        'school_level',
        'enrolled_secondary',

        // Step 4
        'post_secondary',
        'qualification_level',
        'employment_status',
        'study_reason',

        // Step 5
        'fees',
        'organisation_paying',
        'payment_contact_name',
        'payment_contact_email',
        'payment_contact_phone',
        'additional_information',

        // Admin
        'admin_notes',
        'reviewed_by',
        'reviewed_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'current_step' => 'integer',

        'declaration_1' => 'boolean',
        'declaration_2' => 'boolean',
        'declaration_3' => 'boolean',
        'declaration_4' => 'boolean',

        'reviewed_at' => 'datetime',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function getFullNameAttribute(): string
    {
        return trim(
            implode(' ', array_filter([
                $this->first_name,
                $this->middle_name,
                $this->family_name,
            ]))
        );
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
