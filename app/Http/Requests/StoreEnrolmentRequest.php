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
            'prefix' => $this->prefix ? trim((string) $this->prefix) : null,
            'email' => $this->email ? strtolower(trim((string) $this->email)) : null,
            'phone' => $this->phone ? trim((string) $this->phone) : null,
            'first_name' => $this->first_name ? trim((string) $this->first_name) : null,
            'middle_name' => $this->middle_name ? trim((string) $this->middle_name) : null,
            'family_name' => $this->family_name ? trim((string) $this->family_name) : null,
            'full_legal_name' => $this->full_legal_name ? trim((string) $this->full_legal_name) : null,
            'preferred_name' => $this->preferred_name ? trim((string) $this->preferred_name) : null,
            'building_name' => $this->building_name ? trim((string) $this->building_name) : null,
            'unit_number' => $this->unit_number ? trim((string) $this->unit_number) : null,
            'street_number' => $this->street_number ? trim((string) $this->street_number) : null,
            'street_name' => $this->street_name ? trim((string) $this->street_name) : null,
            'suburb' => $this->suburb ? trim((string) $this->suburb) : null,
            'postcode' => $this->postcode ? trim((string) $this->postcode) : null,
            'country' => $this->country ? trim((string) $this->country) : null,
            'state' => $this->state ? trim((string) $this->state) : null,
            'postal_unit' => $this->postal_unit ? trim((string) $this->postal_unit) : null,
            'postal_street_number' => $this->postal_street_number ? trim((string) $this->postal_street_number) : null,
            'postal_street_name' => $this->postal_street_name ? trim((string) $this->postal_street_name) : null,
            'postal_suburb' => $this->postal_suburb ? trim((string) $this->postal_suburb) : null,
            'postal_postcode' => $this->postal_postcode ? trim((string) $this->postal_postcode) : null,
            'postal_country' => $this->postal_country ? trim((string) $this->postal_country) : null,
            'postal_state' => $this->postal_state ? trim((string) $this->postal_state) : null,
            'other_birth_country' => $this->other_birth_country ? trim((string) $this->other_birth_country) : null,
            'other_language' => $this->other_language ? trim((string) $this->other_language) : null,
            'school_level' => $this->school_level ? trim((string) $this->school_level) : null,
            'qualification_level' => $this->qualification_level ? trim((string) $this->qualification_level) : null,
            'employment_status' => $this->employment_status ? trim((string) $this->employment_status) : null,
            'study_reason' => $this->study_reason ? trim((string) $this->study_reason) : null,
            'organisation_paying' => $this->organisation_paying ? trim((string) $this->organisation_paying) : null,
            'payment_contact_name' => $this->payment_contact_name ? trim((string) $this->payment_contact_name) : null,
            'payment_contact_email' => $this->payment_contact_email ? strtolower(trim((string) $this->payment_contact_email)) : null,
            'payment_contact_phone' => $this->payment_contact_phone ? trim((string) $this->payment_contact_phone) : null,
            'additional_information' => $this->additional_information ? trim((string) $this->additional_information) : null,
        ]);
    }

    public function rules(): array
    {
        $step = (int) $this->input('step');
        $applicationId = $this->input('application_id');

        $baseRules = [
            'step' => ['required', 'integer', 'between:1,5'],
            'application_id' => ['nullable', 'integer'],
        ];

        $stepRules = match ($step) {
            1 => [
                'declaration_1' => ['required', 'accepted'],
                'declaration_2' => ['required', 'accepted'],
                'declaration_3' => ['required', 'accepted'],
                'declaration_4' => ['required', 'accepted'],
            ],

            2 => [
                'prefix' => ['nullable', Rule::in(['Mr', 'Mrs', 'Ms', 'Dr'])],
                'first_name' => ['required', 'string', 'max:100'],
                'middle_name' => ['nullable', 'string', 'max:100'],
                'family_name' => ['required', 'string', 'max:100'],
                'full_legal_name' => ['required', 'string', 'max:255'],
                'preferred_name' => ['nullable', 'string', 'max:100'],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('enrolments', 'email')->ignore($applicationId),
                ],
                'phone' => ['required', 'string', 'max:30'],
                'date_of_birth' => ['required', 'date', 'before:today'],
                'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
                'building_name' => ['nullable', 'string', 'max:255'],
                'unit_number' => ['nullable', 'string', 'max:50'],
                'street_number' => ['nullable', 'string', 'max:50'],
                'street_name' => ['required', 'string', 'max:255'],
                'suburb' => ['required', 'string', 'max:255'],
                'postcode' => ['required', 'string', 'max:20'],
                'country' => ['required', 'string', 'max:100'],
                'state' => ['required', 'string', 'max:100'],
                'postal_address' => ['required', Rule::in(['same', 'different'])],
                'postal_unit' => ['nullable', 'string', 'max:50', 'required_if:postal_address,different'],
                'postal_street_number' => ['nullable', 'string', 'max:50', 'required_if:postal_address,different'],
                'postal_street_name' => ['nullable', 'string', 'max:255', 'required_if:postal_address,different'],
                'postal_suburb' => ['nullable', 'string', 'max:255', 'required_if:postal_address,different'],
                'postal_postcode' => ['nullable', 'string', 'max:20', 'required_if:postal_address,different'],
                'postal_country' => ['nullable', 'string', 'max:100', 'required_if:postal_address,different'],
                'postal_state' => ['nullable', 'string', 'max:100', 'required_if:postal_address,different'],
            ],

            3 => [
                'born' => ['required', Rule::in(['Australia', 'Other'])],
                'other_birth_country' => ['nullable', 'string', 'max:100', 'required_if:born,Other'],
                'language' => ['required', Rule::in(['english', 'other'])],
                'other_language' => ['nullable', 'string', 'max:100', 'required_if:language,other'],
                'indigenous' => ['required', Rule::in(['No', 'Yes, Aboriginal', 'Yes, Torres Strait Islander', 'Yes, Aboriginal AND Torres Strait Islander'])],
                'disability' => ['required', Rule::in(['Yes', 'No'])],
                'school_level' => ['required', 'string', 'max:255'],
                'enrolled_secondary' => ['required', Rule::in(['Yes', 'No'])],
            ],

            4 => [
                'post_secondary' => ['required', Rule::in(['Yes', 'No'])],
                'qualification_level' => ['required', 'string', 'max:255'],
                'employment_status' => ['required', 'string', 'max:255'],
                'study_reason' => ['required', 'string', 'max:255'],
            ],

            5 => [
                'fees' => ['required', Rule::in(['self', 'organisation'])],
                'organisation_paying' => ['nullable', 'string', 'max:255', 'required_if:fees,organisation'],
                'payment_contact_name' => ['nullable', 'string', 'max:255', 'required_if:fees,organisation'],
                'payment_contact_email' => ['nullable', 'email', 'max:255', 'required_if:fees,organisation'],
                'payment_contact_phone' => ['nullable', 'string', 'max:30', 'required_if:fees,organisation'],
                'additional_information' => ['nullable', 'string', 'max:5000'],
            ],

            default => [],
        };

        return $baseRules + $stepRules;
    }

    public function messages(): array
    {
        return [
            'declaration_1.accepted' => 'You must accept the first declaration.',
            'declaration_2.accepted' => 'You must accept the second declaration.',
            'declaration_3.accepted' => 'You must accept the third declaration.',
            'declaration_4.accepted' => 'You must accept the fourth declaration.',
            'email.unique' => 'This email has already been used for another enrolment application.',
            'postal_unit.required_if' => 'Postal unit/flat number is required when using a different postal address.',
            'postal_street_number.required_if' => 'Postal street number is required when using a different postal address.',
            'postal_street_name.required_if' => 'Postal street name is required when using a different postal address.',
            'postal_suburb.required_if' => 'Postal suburb is required when using a different postal address.',
            'postal_postcode.required_if' => 'Postal postcode is required when using a different postal address.',
            'postal_country.required_if' => 'Postal country is required when using a different postal address.',
            'postal_state.required_if' => 'Postal state is required when using a different postal address.',
            'other_birth_country.required_if' => 'Please specify your country of birth.',
            'other_language.required_if' => 'Please specify the language spoken at home.',
            'organisation_paying.required_if' => 'Please enter the organisation responsible for payment.',
            'payment_contact_name.required_if' => 'Please enter the payment contact name.',
            'payment_contact_email.required_if' => 'Please enter the payment contact email.',
            'payment_contact_phone.required_if' => 'Please enter the payment contact phone.',
        ];
    }
}
