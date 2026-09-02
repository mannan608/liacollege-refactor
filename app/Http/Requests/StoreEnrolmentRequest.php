<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEnrolmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => $this->email ? strtolower(trim($this->email)) : null,

            'phone' => $this->phone ? trim($this->phone) : null,

            'first_name' => trim((string) $this->first_name),
            'family_name' => trim((string) $this->family_name),
            'full_legal_name' => trim((string) $this->full_legal_name),
        ]);
    }

    public function rules(): array
    {
        return [
            /*
            |--------------------------------------------------------------------------
            | Declarations
            |--------------------------------------------------------------------------
            */
            'declaration_1' => ['required', 'accepted'],
            'declaration_2' => ['required', 'accepted'],
            'declaration_3' => ['required', 'accepted'],
            'declaration_4' => ['required', 'accepted'],

            /*
            |--------------------------------------------------------------------------
            | Personal
            |--------------------------------------------------------------------------
            */
            'prefix' => ['nullable', Rule::in(['Mr', 'Mrs', 'Ms', 'Dr'])],

            'first_name' => ['required', 'string', 'max:100'],

            'middle_name' => ['nullable', 'string', 'max:100'],

            'family_name' => ['required', 'string', 'max:100'],

            'full_legal_name' => ['required', 'string', 'max:255'],

            'preferred_name' => ['nullable', 'string', 'max:100'],

            'email' => ['required', 'email', 'max:255', 'unique:enrolments,email'],

            'phone' => ['required', 'string', 'max:30'],

            'date_of_birth' => ['required', 'date', 'before:today'],

            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],

            /*
            |--------------------------------------------------------------------------
            | Residential Address
            |--------------------------------------------------------------------------
            */
            'building_name' => ['nullable', 'string', 'max:255'],

            'unit_number' => ['nullable', 'string', 'max:50'],

            'street_number' => ['nullable', 'string', 'max:50'],

            'street_name' => ['required', 'string', 'max:255'],

            'suburb' => ['required', 'string', 'max:255'],

            'postcode' => ['required', 'string', 'max:20'],

            'country' => ['required', 'string', 'max:100'],

            'state' => ['required', 'string', 'max:100'],

            /*
            |--------------------------------------------------------------------------
            | Postal
            |--------------------------------------------------------------------------
            */
            'postal_address' => ['required', Rule::in(['same', 'different'])],

            'postal_unit' => ['nullable', 'string', 'max:50', 'required_if:postal_address,different'],

            'postal_street_number' => ['nullable', 'string', 'max:50', 'required_if:postal_address,different'],

            'postal_street_name' => ['nullable', 'string', 'max:255', 'required_if:postal_address,different'],

            'postal_suburb' => ['nullable', 'string', 'max:255', 'required_if:postal_address,different'],

            'postal_postcode' => ['nullable', 'string', 'max:20', 'required_if:postal_address,different'],

            'postal_country' => ['nullable', 'string', 'max:100', 'required_if:postal_address,different'],

            'postal_state' => ['nullable', 'string', 'max:100', 'required_if:postal_address,different'],

            /*
            |--------------------------------------------------------------------------
            | Background
            |--------------------------------------------------------------------------
            */
            'born' => ['required', Rule::in(['Australia', 'Other'])],

            'other_birth_country' => ['nullable', 'string', 'max:100', 'required_if:born,Other'],

            'language' => ['required', Rule::in(['english', 'other'])],

            'other_language' => ['nullable', 'string', 'max:100', 'required_if:language,other'],

            'indigenous' => ['required', Rule::in(['No', 'Yes, Aboriginal', 'Yes, Torres Strait Islander', 'Yes, Aboriginal AND Torres Strait Islander'])],

            'disability' => ['required', Rule::in(['Yes', 'No'])],

            /*
            |--------------------------------------------------------------------------
            | School
            |--------------------------------------------------------------------------
            */
            'school_level' => ['required', 'string', 'max:255'],

            'enrolled_secondary' => ['required', Rule::in(['Yes', 'No'])],

            /*
            |--------------------------------------------------------------------------
            | Qualifications
            |--------------------------------------------------------------------------
            */
            'post_secondary' => ['required', Rule::in(['Yes', 'No'])],

            'qualification_level' => ['required', 'string', 'max:255'],

            'employment_status' => ['required', 'string', 'max:255'],

            'study_reason' => ['required', 'string', 'max:255'],

            /*
            |--------------------------------------------------------------------------
            | Fees
            |--------------------------------------------------------------------------
            */
            'fees' => ['required', Rule::in(['self', 'organisation'])],

            'organisation_paying' => ['nullable', 'string', 'max:255', 'required_if:fees,organisation'],

            'payment_contact_name' => ['nullable', 'string', 'max:255', 'required_if:fees,organisation'],

            'payment_contact_email' => ['nullable', 'email', 'max:255', 'required_if:fees,organisation'],

            'payment_contact_phone' => ['nullable', 'string', 'max:30', 'required_if:fees,organisation'],

            'additional_information' => ['nullable', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'declaration_1.accepted' => 'You must accept the Terms & Conditions.',

            'declaration_2.accepted' => 'You must confirm course eligibility.',

            'declaration_3.accepted' => 'You must confirm your study commitment.',

            'declaration_4.accepted' => 'You must acknowledge the online learning requirements.',

            'postal_unit.required_if' => 'Postal unit/flat number is required when using a different postal address.',

            'postal_street_name.required_if' => 'Postal street name is required when using a different postal address.',

            'other_birth_country.required_if' => 'Please specify your country of birth.',

            'other_language.required_if' => 'Please specify the language spoken at home.',

            'organisation_paying.required_if' => 'Please enter the organisation responsible for payment.',

            'payment_contact_name.required_if' => 'Please enter the payment contact name.',

            'payment_contact_email.required_if' => 'Please enter the payment contact email.',

            'payment_contact_phone.required_if' => 'Please enter the payment contact phone.',
        ];
    }
}