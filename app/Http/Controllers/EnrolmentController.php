<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrolmentRequest;
use App\Models\Enrolment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EnrolmentController extends Controller
{

    public function create(Request $request)
    {
        
        $enrolment = null;

        if ($request->filled('application_id')) {
            $enrolment = Enrolment::find($request->integer('application_id'));
        }

        return view('frontend.pages.register.register', compact('enrolment'));
    }
  

    public function store(StoreEnrolmentRequest $request)
    {
        try {
            $step = (int) $request->input('step');

            if (! in_array($step, [1, 2, 3, 4, 5], true)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid form step.',
                ], 422);
            }

            $validated = $request->validated();
            $applicationId = $request->input('application_id');

            $enrolment = DB::transaction(function () use ($request, $validated, $applicationId, $step) {
                $enrolment = null;

                if ($applicationId) {
                    $enrolment = Enrolment::find($applicationId);

                    if (! $enrolment) {
                        return null;
                    }
                } else {
                    $enrolment = new Enrolment();

                    do {
                        $applicationNumber = 'ENR-' . now()->format('Y') . '-' . strtoupper(Str::random(8));
                    } while (Enrolment::where('application_number', $applicationNumber)->exists());

                    $enrolment->application_number = $applicationNumber;
                }

                /*
                |------------------------------------------------------------------
                | STEP 1
                |------------------------------------------------------------------
                */

                if ($step === 1) {
                    $enrolment->declaration_1 = $request->boolean('declaration_1');
                    $enrolment->declaration_2 = $request->boolean('declaration_2');
                    $enrolment->declaration_3 = $request->boolean('declaration_3');
                    $enrolment->declaration_4 = $request->boolean('declaration_4');
                }

                /*
                |------------------------------------------------------------------
                | STEP 2
                |------------------------------------------------------------------
                */

                if ($step === 2) {
                    $enrolment->prefix = $validated['prefix'] ?? null;
                    $enrolment->first_name = $validated['first_name'];
                    $enrolment->middle_name = $validated['middle_name'] ?? null;
                    $enrolment->family_name = $validated['family_name'];
                    $enrolment->full_legal_name = $validated['full_legal_name'];
                    $enrolment->preferred_name = $validated['preferred_name'] ?? null;
                    $enrolment->email = $validated['email'];
                    $enrolment->phone = $validated['phone'];
                    $enrolment->date_of_birth = $validated['date_of_birth'];
                    $enrolment->gender = $validated['gender'];

                    $enrolment->building_name = $validated['building_name'] ?? null;
                    $enrolment->unit_number = $validated['unit_number'] ?? null;
                    $enrolment->street_number = $validated['street_number'] ?? null;
                    $enrolment->street_name = $validated['street_name'];
                    $enrolment->suburb = $validated['suburb'];
                    $enrolment->postcode = $validated['postcode'];
                    $enrolment->country = $validated['country'];
                    $enrolment->state = $validated['state'];

                    $enrolment->postal_address = $validated['postal_address'];
                    $enrolment->postal_unit = $validated['postal_address'] === 'different' ? ($validated['postal_unit'] ?? null) : null;
                    $enrolment->postal_street_number = $validated['postal_address'] === 'different' ? ($validated['postal_street_number'] ?? null) : null;
                    $enrolment->postal_street_name = $validated['postal_address'] === 'different' ? ($validated['postal_street_name'] ?? null) : null;
                    $enrolment->postal_suburb = $validated['postal_address'] === 'different' ? ($validated['postal_suburb'] ?? null) : null;
                    $enrolment->postal_postcode = $validated['postal_address'] === 'different' ? ($validated['postal_postcode'] ?? null) : null;
                    $enrolment->postal_country = $validated['postal_address'] === 'different' ? ($validated['postal_country'] ?? null) : null;
                    $enrolment->postal_state = $validated['postal_address'] === 'different' ? ($validated['postal_state'] ?? null) : null;
                }

                /*
                |------------------------------------------------------------------
                | STEP 3
                |------------------------------------------------------------------
                */

                if ($step === 3) {
                    $enrolment->born = $validated['born'];
                    $enrolment->other_birth_country = $validated['born'] === 'Other' ? ($validated['other_birth_country'] ?? null) : null;
                    $enrolment->language = $validated['language'];
                    $enrolment->other_language = $validated['language'] === 'other' ? ($validated['other_language'] ?? null) : null;
                    $enrolment->indigenous = $validated['indigenous'];
                    $enrolment->disability = $validated['disability'];
                    $enrolment->school_level = $validated['school_level'];
                    $enrolment->enrolled_secondary = $validated['enrolled_secondary'];
                }

                /*
                |------------------------------------------------------------------
                | STEP 4
                |------------------------------------------------------------------
                */

                if ($step === 4) {
                    $enrolment->post_secondary = $validated['post_secondary'];
                    $enrolment->qualification_level = $validated['qualification_level'];
                    $enrolment->employment_status = $validated['employment_status'];
                    $enrolment->study_reason = $validated['study_reason'];
                }

                /*
                |------------------------------------------------------------------
                | STEP 5
                |------------------------------------------------------------------
                */

                if ($step === 5) {
                    $enrolment->fees = $validated['fees'];
                    $enrolment->organisation_paying = $validated['fees'] === 'organisation' ? ($validated['organisation_paying'] ?? null) : null;
                    $enrolment->payment_contact_name = $validated['fees'] === 'organisation' ? ($validated['payment_contact_name'] ?? null) : null;
                    $enrolment->payment_contact_email = $validated['fees'] === 'organisation' ? ($validated['payment_contact_email'] ?? null) : null;
                    $enrolment->payment_contact_phone = $validated['fees'] === 'organisation' ? ($validated['payment_contact_phone'] ?? null) : null;
                    $enrolment->additional_information = $validated['additional_information'] ?? null;
                }

                $enrolment->current_step = $step;
                $enrolment->status = $step === 5 ? 'pending' : 'draft';
                $enrolment->save();

                return $enrolment;
            });

            if (! $enrolment) {
                return response()->json([
                    'success' => false,
                    'message' => 'Enrolment application not found.',
                ], 404);
            }

            if ($step === 2) {
                try {
                    Mail::raw(
                        "New Enrolment Step 2 Submission\n\n" .
                        "Name: {$enrolment->full_legal_name}\n" .
                        "Email: {$enrolment->email}\n" .
                        "Phone: {$enrolment->phone}\n",
                        function ($message) {
                            $message
                                ->to('enrol@liacollege.edu.au')
                                ->subject('New Enrolment Step 2 Submission - Lia College');
                        }
                    );
                } catch (\Throwable $e) {
                    report($e);
                }
            }

            return response()->json([
                'success' => true,
                'message' => $step === 5 ? 'Your enrolment application has been submitted successfully.' : null,
                'application_id' => $enrolment->id,
                'step' => $enrolment->current_step,
                'status' => $enrolment->status,
                'completed' => $enrolment->status === 'pending',
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Unable to submit your application. Please try again.',
            ], 500);
        }
    }

    public function success(Enrolment $enrolment)
    {
        return view('frontend.enrolments.success', compact('enrolment'));
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN CRUD
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Enrolment::query();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('application_number', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('family_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        /*
        |--------------------------------------------------------------------------
        | Gender filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        /*
        |--------------------------------------------------------------------------
        | Date filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $enrolments = $query->latest()->paginate(20)->withQueryString();

        return view('admin.enrolments.index', compact('enrolments'));
    }

    public function destroy(Enrolment $enrolment)
    {
        try {
            /*
            |--------------------------------------------------------------------------
            | Optional protection
            |--------------------------------------------------------------------------
            */

            if ($enrolment->status === 'approved') {
                return back()->with('error', 'Approved enrolments cannot be deleted.');
            }

            $enrolment->delete();

            return redirect()->route('admin.enrolments.index')->with('success', 'Enrolment deleted successfully.');
        } catch (\Throwable $e) {
            report($e);

            return back()->with('error', 'Unable to delete enrolment.');
        }
    }
}
