<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrolments', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Application
            |--------------------------------------------------------------------------
            */
            $table->string('application_number', 30)->unique();

            $table->enum('status', [
                'draft',
                'pending',
                'under_review',
                'approved',
                'rejected',
                'cancelled',
            ])->default('draft')->index();

            $table->unsignedTinyInteger('current_step')->default(1);

            /*
            |--------------------------------------------------------------------------
            | Step 1 - Declarations
            |--------------------------------------------------------------------------
            */
            $table->boolean('declaration_1')->default(false);
            $table->boolean('declaration_2')->default(false);
            $table->boolean('declaration_3')->default(false);
            $table->boolean('declaration_4')->default(false);

            /*
            |--------------------------------------------------------------------------
            | Step 2 - Personal Information
            |--------------------------------------------------------------------------
            */
            $table->string('prefix', 20)->nullable();

            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('family_name')->nullable();

            $table->string('full_legal_name')->nullable();

            $table->string('preferred_name')->nullable();

            $table->string('email')->nullable()->index();
            $table->string('phone')->nullable()->index();

            $table->date('date_of_birth')->nullable();

            $table->string('gender', 20)->nullable();

            /*
            |--------------------------------------------------------------------------
            | Residential Address
            |--------------------------------------------------------------------------
            */
            $table->string('building_name')->nullable();
            $table->string('unit_number')->nullable();
            $table->string('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('suburb')->nullable();
            $table->string('postcode', 20)->nullable();

            $table->string('country')->nullable();
            $table->string('state')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Postal Address
            |--------------------------------------------------------------------------
            */
            $table->enum('postal_address', [
                'same',
                'different',
            ])->default('same');

            $table->string('postal_unit')->nullable();
            $table->string('postal_street_number')->nullable();
            $table->string('postal_street_name')->nullable();
            $table->string('postal_suburb')->nullable();
            $table->string('postal_postcode', 20)->nullable();
            $table->string('postal_country')->nullable();
            $table->string('postal_state')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Step 3 - Background
            |--------------------------------------------------------------------------
            */
            $table->string('born')->nullable();
            $table->string('other_birth_country')->nullable();

            $table->string('language')->nullable();
            $table->string('other_language')->nullable();

            $table->string('indigenous')->nullable();

            $table->string('disability')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Schooling
            |--------------------------------------------------------------------------
            */
            $table->string('school_level')->nullable();
            $table->string('enrolled_secondary')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Step 4 - Qualification
            |--------------------------------------------------------------------------
            */
            $table->string('post_secondary')->nullable();
            $table->string('qualification_level')->nullable();

            $table->string('employment_status')->nullable();

            $table->string('study_reason')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Step 5 - Fees
            |--------------------------------------------------------------------------
            */
            $table->string('fees')->default('self');

            $table->string('organisation_paying')->nullable();
            $table->string('payment_contact_name')->nullable();
            $table->string('payment_contact_email')->nullable();
            $table->string('payment_contact_phone')->nullable();

            $table->text('additional_information')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Admin Information
            |--------------------------------------------------------------------------
            */
            $table->text('admin_notes')->nullable();

            $table->foreignId('reviewed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrolments');
    }
};
