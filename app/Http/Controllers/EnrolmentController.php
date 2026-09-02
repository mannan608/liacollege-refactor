<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrolmentRequest;
use App\Models\Enrolment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnrolmentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FRONTEND
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('frontend.pages.register.register');
    }

    public function store(StoreEnrolmentRequest $request)
    {
        try {
            $enrolment = DB::transaction(function () use ($request) {
                $data = $request->validated();

                /*
                |--------------------------------------------------------------------------
                | Clean conditional fields
                |--------------------------------------------------------------------------
                */

                if ($data['postal_address'] === 'same') {
                    $data['postal_unit'] = null;
                    $data['postal_street_number'] = null;
                    $data['postal_street_name'] = null;
                    $data['postal_suburb'] = null;
                    $data['postal_postcode'] = null;
                    $data['postal_country'] = null;
                    $data['postal_state'] = null;
                }

                if ($data['born'] !== 'Other') {
                    $data['other_birth_country'] = null;
                }

                if ($data['language'] !== 'other') {
                    $data['other_language'] = null;
                }

                if ($data['fees'] !== 'organisation') {
                    $data['organisation_paying'] = null;
                    $data['payment_contact_name'] = null;
                    $data['payment_contact_email'] = null;
                    $data['payment_contact_phone'] = null;
                }

                /*
                |--------------------------------------------------------------------------
                | Generate unique application number
                |--------------------------------------------------------------------------
                */

                do {
                    $applicationNumber = 'ENR-' . now()->format('Y') . '-' . strtoupper(Str::random(8));
                } while (Enrolment::where('application_number', $applicationNumber)->exists());

                $data['application_number'] = $applicationNumber;
                $data['status'] = 'pending';

                return Enrolment::create($data);
            });

            return redirect()->route('enrolments.success', $enrolment)->with('success', 'Your enrolment application has been submitted successfully.');
        } catch (\Throwable $e) {
            report($e);

            return back()->withInput()->with('error', 'Unable to submit your application. Please try again.');
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