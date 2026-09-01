@extends('frontend.layouts.app')

@section('content')
<div class="w-full max-w-4xl mx-auto py-8 px-4 sm:px-6">
    <div class="min-h-screen bg-slate-50 py-8 sm:py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-brand-900 via-brand-800 to-slate-900 px-6 py-8 sm:px-10 sm:py-10 shadow-xl">

            <div class="absolute -right-20 -top-20 w-64 h-64 rounded-full bg-white/5"></div>
            <div class="absolute -left-20 -bottom-32 w-72 h-72 rounded-full bg-brand-400/10"></div>

            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full
                                bg-white/10 border border-white/10
                                text-brand-100 text-xs font-semibold mb-4">
                        <i class="fa-solid fa-graduation-cap"></i>
                        Enrolment Portal
                    </div>

                    <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">
                        Student Enrolment
                    </h1>

                    <p class="mt-3 text-sm sm:text-base text-brand-100 leading-relaxed">
                        Complete your enrolment application in a few simple steps.
                        Your information will be securely processed by our admissions team.
                    </p>
                </div>

                <div class="hidden lg:flex items-center justify-center w-16 h-16
                            rounded-2xl bg-white/10 border border-white/10">
                    <i class="fa-solid fa-file-signature text-2xl text-white"></i>
                </div>

            </div>
        </div>


        <section>
        <div class="flex items-start gap-4 mb-5">
            <div class="shrink-0 w-11 h-11 rounded-xl bg-brand-50
                        flex items-center justify-center">
                <i class="fa-solid fa-circle-info text-brand-700"></i>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900">
                    Before you start
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Please have the following information ready before
                    beginning your enrolment.
                </p>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-4">

            <div class="rounded-2xl border border-slate-200 bg-slate-50
                        p-5 hover:bg-white hover:border-brand-200 transition">

                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-white border
                                border-slate-200 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-id-card text-brand-700"></i>
                    </div>

                    <div>
                        <h3 class="font-semibold text-slate-900">
                            Unique Student Identifier
                        </h3>

                        <p class="mt-1 text-sm text-slate-500 leading-relaxed">
                            Your Unique Student Identifier (USI).
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-slate-50
                        p-5 hover:bg-white hover:border-brand-200 transition">

                <div class="flex gap-4">
                    <div class="w-10 h-10 rounded-xl bg-white border
                                border-slate-200 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-file-image text-brand-700"></i>
                    </div>

                    <div>
                        <h3 class="font-semibold text-slate-900">
                            Photo ID
                        </h3>

                        <p class="mt-1 text-sm text-slate-500 leading-relaxed">
                            A picture or scan of your photo ID,
                            such as a driver's licence or passport.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Enrolment Process -->
    <section class="rounded-2xl border border-brand-100 bg-brand-25 p-6">

        <div class="flex items-center gap-3 mb-5">
            <div class="w-10 h-10 rounded-xl bg-white
                        flex items-center justify-center">
                <i class="fa-solid fa-list-check text-brand-700"></i>
            </div>

            <h2 class="text-lg font-bold text-slate-900">
                The enrolment process
            </h2>
        </div>

        <div class="space-y-5">

            <div class="flex gap-4">
                <div class="shrink-0 w-8 h-8 rounded-full bg-brand-700
                            text-white flex items-center justify-center
                            text-xs font-bold">
                    1
                </div>

                <div>
                    <h3 class="font-semibold text-slate-900">
                        Complete this form
                    </h3>

                    <p class="mt-1 text-sm text-slate-600 leading-relaxed">
                        Provide the information requested throughout this
                        enrolment application.
                    </p>
                </div>
            </div>

            <div class="flex gap-4">
                <div class="shrink-0 w-8 h-8 rounded-full bg-brand-700
                            text-white flex items-center justify-center
                            text-xs font-bold">
                    2
                </div>

                <div>
                    <h3 class="font-semibold text-slate-900">
                        Application approval
                    </h3>

                    <p class="mt-1 text-sm text-slate-600 leading-relaxed">
                        Once approved, usually the same or next working day,
                        we will send you an invoice and welcome email.
                    </p>
                </div>
            </div>

            <div class="flex gap-4">
                <div class="shrink-0 w-8 h-8 rounded-full bg-brand-700
                            text-white flex items-center justify-center
                            text-xs font-bold">
                    3
                </div>

                <div>
                    <h3 class="font-semibold text-slate-900">
                        Payment & online access
                    </h3>

                    <p class="mt-1 text-sm text-slate-600 leading-relaxed">
                        After payment of your initial fee, you will receive
                        access to our online learning system where you can
                        interact with tutors and fellow course participants.
                    </p>
                </div>
            </div>

            <div class="flex gap-4">
                <div class="shrink-0 w-8 h-8 rounded-full bg-brand-700
                            text-white flex items-center justify-center
                            text-xs font-bold">
                    4
                </div>

                <div>
                    <h3 class="font-semibold text-slate-900">
                        Face-to-face training
                    </h3>

                    <p class="mt-1 text-sm text-slate-600 leading-relaxed">
                        If applicable, we will confirm dates, times and
                        locations for face-to-face training.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <div class="bg-white rounded-b-2xl shadow-xl border border-t-0 border-slate-200/80 p-6 sm:p-10">

        <div class="mb-10">
            <div class="grid grid-cols-5 gap-2 text-center text-xs font-semibold text-slate-500 mb-2">
                <span class="text-brand-800">1. Terms</span>
                <span>2. Personal</span>
                <span>3. Background</span>
                <span>4. Education</span>
                <span>5. Finish</span>
            </div>
            <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden flex">
                <div class="bg-brand-700 h-full w-1/5 rounded-full transition-all duration-300"></div>
            </div>
        </div>

        <form id="enrolmentForm">

            <div id="step-1" class="step-content space-y-8">
                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-4 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-file-contract text-brand-700"></i> Declarations & Acknowledgements
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-brand-300 transition-all">
                            <p class="text-sm text-slate-700 mb-3">
                                I declare that I have read, understood and agree with the terms and conditions of enrolment. <span class="text-rose-500 font-bold">*</span>
                            </p>
                            <label class="inline-flex items-center gap-2.5 text-sm font-semibold text-brand-900 cursor-pointer select-none">
                                <input type="checkbox" required class="w-4 h-4 rounded border-slate-300 text-brand-700 focus:ring-brand-600 cursor-pointer">
                                <span>I agree</span>
                            </label>
                        </div>

                        <div class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-brand-300 transition-all">
                            <p class="text-sm text-slate-700 mb-3">
                                I have checked the specific course and entry requirements on the Courses Page, for the course I want to study and I confirm that I am eligible. I agree that some courses have practical requirements that may require me to organise others to assist me. <span class="text-rose-500 font-bold">*</span>
                            </p>
                            <label class="inline-flex items-center gap-2.5 text-sm font-semibold text-brand-900 cursor-pointer select-none">
                                <input type="checkbox" required class="w-4 h-4 rounded border-slate-300 text-brand-700 focus:ring-brand-600 cursor-pointer">
                                <span>I agree</span>
                            </label>
                        </div>

                        <div class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-brand-300 transition-all">
                            <p class="text-sm text-slate-700 mb-3">
                                I'm committed to putting in the effort required to earn my qualification. <span class="text-rose-500 font-bold">*</span>
                            </p>
                            <label class="inline-flex items-center gap-2.5 text-sm font-semibold text-brand-900 cursor-pointer select-none">
                                <input type="checkbox" required class="w-4 h-4 rounded border-slate-300 text-brand-700 focus:ring-brand-600 cursor-pointer">
                                <span>I'm committed!</span>
                            </label>
                        </div>

                        <div class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-brand-300 transition-all">
                            <p class="text-sm text-slate-700 mb-3">
                                I understand that Bard College courses may be delivered in part or entirely online and this requires considerable motivation and self-discipline. It also requires a basic level of digital literacy skills. <span class="text-rose-500 font-bold">*</span>
                            </p>
                            <label class="inline-flex items-center gap-2.5 text-sm font-semibold text-brand-900 cursor-pointer select-none">
                                <input type="checkbox" required class="w-4 h-4 rounded border-slate-300 text-brand-700 focus:ring-brand-600 cursor-pointer">
                                <span>I understand</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-1">
                        <i class="fa-solid fa-book-open-reader text-brand-700"></i> Course Selection
                    </h2>
                    <p class="text-xs text-slate-500 mb-4">Select the course(s) you wish to enroll into.</p>
                    
                    <div class="grid grid-cols-1 gap-2.5">
                        @php
                            $courses = [
                                "TAE40122 Certificate IV in Training and Assessment",
                                "BSB50820 Diploma of Project Management",
                                "BSB60820 Advanced Diploma of Program Management",
                                "RII60520 Advanced Diploma of Civil Construction Design",
                                "BSB80120 Graduate Diploma of Management (Learning)",
                                "HLTIAD009 Provide Cardiopulmonary Resuscitation",
                                "HLTAID011 Provide First Aid",
                                "HLTAID012 Provide First Aid in an Education and Care Setting",
                                "CPCWHS1001 Prepare to Work Safely in the Construction Industry",
                                "SITHFAB021 Provide Responsible Service of Alcohol (Intake)"
                            ];
                        @endphp

                        @foreach($courses as $index => $course)
                        <label class="flex items-start gap-3 p-3.5 rounded-xl border border-slate-200  hover:bg-slate-50 transition-all cursor-pointer">
                            <input type="checkbox" name="course" {{ $index === 7 ? 'checked' : '' }} class="mt-0.5 w-4 h-4 rounded border-slate-300 text-brand-700 focus:ring-brand-600 cursor-pointer">
                            <span class="text-sm font-medium text-slate-800">{{ $course }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-1">
                        <i class="fa-solid fa-id-card text-brand-700"></i> Legal Name Identification
                    </h2>
                    <p class="text-xs text-slate-500 mb-4">Please write your name, including any middle names, exactly as written on your official identity documents.</p>

                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Full Legal Name Format Verification</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <input type="text" placeholder="As shown on Passport, Driver's License, etc." class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Prefix <span class="text-rose-500">*</span></label>
                            <select class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all">
                                <option selected>Mr</option>
                                <option>Mrs</option>
                                <option>Ms</option>
                                <option>Dr</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">First given name <span class="text-rose-500">*</span></label>
                            <input type="text" value="Md Abdul" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Middle name</label>
                            <input type="text" placeholder="Middle name" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Family name <span class="text-rose-500">*</span></label>
                            <input type="text" value="rok" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all">
                        </div>
                    </div>
                </div>
            </div>

            <div id="step-2" class="step-content hidden space-y-8">
                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-4 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-address-book text-brand-700"></i> Contact & Personal Information
                    </h2>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Preferred Name</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-signature"></i>
                                </div>
                                <input type="text" placeholder="E.g. Bob instead of Robert, Tess instead of Theresa" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Email Address <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <input type="email" value="mannan@gmail.com" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Confirm Email <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </div>
                                    <input type="email" value="mannan@gmail.com" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Mobile <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-mobile-screen"></i>
                                    </div>
                                    <input type="text" value="01315-565037" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Home Phone</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <input type="text" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Work Phone</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-briefcase"></i>
                                    </div>
                                    <input type="text" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-end">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Date of Birth <span class="text-rose-500">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <input type="date" value="2026-01-09" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Gender <span class="text-rose-500">*</span></label>
                                <div class="flex items-center gap-4 py-1">
                                    <label class="inline-flex items-center gap-2 cursor-pointer text-sm text-slate-700 font-medium">
                                        <input type="radio" name="gender" checked class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Male
                                    </label>
                                    <label class="inline-flex items-center gap-2 cursor-pointer text-sm text-slate-700 font-medium">
                                        <input type="radio" name="gender" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Female
                                    </label>
                                    <label class="inline-flex items-center gap-2 cursor-pointer text-sm text-slate-700 font-medium">
                                        <input type="radio" name="gender" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Other
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-3 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-building text-brand-700"></i> Employer Information
                    </h2>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Organisation Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                <i class="fa-solid fa-building-user"></i>
                            </div>
                            <input type="text" placeholder="Current employer/organisation" class="w-full pl-9 pr-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-1">
                        <i class="fa-solid fa-location-dot text-brand-700"></i> Residential Address
                    </h2>
                    <p class="text-xs text-slate-500 mb-4">Your usual place of residence (required for official documentation)</p>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Building or Property Name <span class="text-rose-500">*</span></label>
                            <input type="text" value="mannan" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Unit or Flat Number</label>
                                <input type="text" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Street Number <span class="text-rose-500">*</span></label>
                                <input type="text" value="120" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Street Name <span class="text-rose-500">*</span></label>
                                <input type="text" value="raf" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Suburb, Locality or Town <span class="text-rose-500">*</span></label>
                                <input type="text" value="fff" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Postcode <span class="text-rose-500">*</span></label>
                                <input type="text" value="1207" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all placeholder:text-slate-400">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Country <span class="text-rose-500">*</span></label>
                                <select class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all">
                                    <option selected>Austria</option>
                                    <option>Australia</option>
                                    <option>Bangladesh</option>
                                    <option>United States</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">State/Territory <span class="text-rose-500">*</span></label>
                                <select class="w-full px-3 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all">
                                    <option selected>Victoria</option>
                                    <option>New South Wales</option>
                                    <option>Queensland</option>
                                </select>
                            </div>
                        </div>

                        <div class="pt-2">
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Do you have a separate postal address? <span class="text-rose-500">*</span></label>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="postal" checked class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> No - use my address above
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="postal" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Yes (enter details)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="step-3" class="step-content hidden space-y-8">
                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-4 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-earth-americas text-brand-700"></i> Language & Cultural Diversity
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <p class="text-sm font-semibold text-slate-800 mb-2">In which country were you born? <span class="text-rose-500">*</span></p>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="born" checked class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Australia
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="born" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Other
                                </label>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-800 mb-0.5">Do you speak a language other than English at home?</p>
                            <p class="text-xs text-slate-500 mb-2">If more than one language, indicate the one that is spoken most often. <span class="text-rose-500">*</span></p>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="language" checked class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> No, English only
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="language" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Yes, other
                                </label>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-800 mb-2">Are you of Aboriginal or Torres Strait Islander origin? <span class="text-rose-500">*</span></p>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="indigenous" checked class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> No
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="indigenous" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Yes, Aboriginal
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="indigenous" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Yes, Torres Strait Islander
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="indigenous" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Yes, Aboriginal AND Torres Strait Islander
                                </label>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-800 mb-2">Do you consider yourself to have a disability, impairment or long-term condition?</p>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="disability" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> No
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="disability" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Yes
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-4 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-school text-brand-700"></i> Schooling Background
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <p class="text-sm font-semibold text-slate-800 mb-2">What is your highest completed school level? <span class="text-rose-500">*</span></p>
                            <div class="space-y-2">
                                @php
                                    $levels = [
                                        "Year 12 or equivalent", "Year 11 or equivalent", "Year 10 or equivalent",
                                        "Year 9 or equivalent", "Year 8 or below", "Never attended school",
                                        "Never completed any primary or secondary level education", "Not specified"
                                    ];
                                @endphp
                                @foreach($levels as $index => $level)
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="school_level" {{ $index === 0 ? 'checked' : '' }} class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> {{ $level }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-800 mb-2">Are you still enrolled in secondary or senior secondary education? <span class="text-rose-500">*</span></p>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="enrolled_secondary" checked class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> No
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="enrolled_secondary" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Yes
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="step-4" class="step-content hidden space-y-8">
                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-4 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-award text-brand-700"></i> Qualifications
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <p class="text-sm font-semibold text-slate-800 mb-2">Do you have post-secondary qualifications? <span class="text-rose-500">*</span></p>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="post_secondary" checked class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> No
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="post_secondary" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Yes
                                </label>
                            </div>
                        </div>

                        <div>
                            <p class="text-xs font-semibold text-slate-700 uppercase tracking-wider mb-3">Select the HIGHEST level of qualification completed:</p>
                            <div class="space-y-2">
                                @php
                                    $qualifications = [
                                        "Bachelor Degree or Higher Degree", "Advanced Diploma or Associate Degree",
                                        "Diploma (or Associate Diploma)", "Certificate IV (or advanced certificate/technician)",
                                        "Certificate III (or trade certificate)", "Certificate II", "Certificate I",
                                        "Certificates other than the above"
                                    ];
                                @endphp
                                @foreach($qualifications as $index => $qual)
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="qualification_level" {{ $index === 1 ? 'checked' : '' }} class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> {{ $qual }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-3 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-user-tie text-brand-700"></i> Employment Status
                    </h2>
                    <p class="text-xs text-slate-500 mb-3">Which category best describes your current employment status? <span class="text-rose-500">*</span></p>

                    <div class="space-y-2">
                        @php
                            $statuses = [
                                "Full-time employee", "Part-time employee", "Self-employed - not employing others",
                                "Employer", "Employed - unpaid worker in family business", "Unemployed - seeking full-time work",
                                "Unemployed - seeking part-time work", "Not employed - not seeking employment"
                            ];
                        @endphp
                        @foreach($statuses as $index => $status)
                        <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                            <input type="radio" name="employment_status" {{ $index === 0 ? 'checked' : '' }} class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> {{ $status }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-3 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-lightbulb text-brand-700"></i> Main Reason for Study
                    </h2>
                    <p class="text-xs text-slate-500 mb-3">Which category best describes the main reason for undertaking this course?</p>

                    <div class="space-y-2">
                        @php
                            $reasons = [
                                "To get a job", "To develop my existing business", "To start my own business",
                                "To try for a different career", "To get a better job or promotion", "It was a requirement of my job",
                                "I wanted extra skills for my job", "To get into another course of study",
                                "For personal interest or self-development", "To get skills for community/voluntary work", "Other reasons"
                            ];
                        @endphp
                        @foreach($reasons as $index => $reason)
                        <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                            <input type="radio" name="study_reason" {{ $index === 0 ? 'checked' : '' }} class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> {{ $reason }}
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="step-5" class="step-content hidden space-y-8">
                <div>
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-4 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-receipt text-brand-700"></i> Additional Information
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <p class="text-sm font-semibold text-slate-800 mb-2">Course Fees <span class="text-rose-500">*</span></p>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="fees" checked class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> I'm paying for this course myself
                                </label>
                                <label class="flex items-center gap-2.5 cursor-pointer text-sm text-slate-700">
                                    <input type="radio" name="fees" class="w-4 h-4 text-brand-700 border-slate-300 focus:ring-brand-600 cursor-pointer"> Someone else is paying (e.g. my company)
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Anything else?</label>
                            <textarea rows="4" placeholder="Enter any additional requirements, comments, or notes here..." class="w-full p-3 bg-slate-50 border border-slate-300 rounded-lg text-sm text-slate-800 focus:outline-none focus:ring-0 focus:ring-brand-700 focus:bg-white transition-all"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex items-center justify-between">
                <button type="button" id="prevBtn" class="hidden inline-flex items-center gap-2 px-5 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 font-medium text-sm transition-all shadow-sm">
                    <i class="fa-solid fa-arrow-left"></i> Previous
                </button>
                <div class="ml-auto flex gap-3">
                    <button type="button" id="nextBtn" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-brand-800 hover:bg-brand-900 text-white font-semibold text-sm transition-all shadow-md">
                        Next <i class="fa-solid fa-arrow-right"></i>
                    </button>
                    <button type="submit" id="submitBtn" class="hidden items-center gap-2 px-6 py-2.5 rounded-lg bg-amber-500 hover:bg-amber-600 text-slate-900 font-bold text-sm transition-all shadow-md">
                        Submit <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>


  <script>
    let currentStep = 1;
    const totalSteps = 5;

    const form = document.getElementById('enrolmentForm');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');

    function updateStep() {
        // Hide all steps
        document.querySelectorAll('.step-content').forEach(step => {
            step.classList.add('hidden');
        });

        // Show current step
        const activeStep = document.getElementById(`step-${currentStep}`);

        if (activeStep) {
            activeStep.classList.remove('hidden');
        }

        // Previous button
        if (currentStep === 1) {
            prevBtn.classList.add('hidden');
        } else {
            prevBtn.classList.remove('hidden');
        }

        // Next / Submit buttons
        if (currentStep === totalSteps) {
            nextBtn.classList.add('hidden');
            submitBtn.classList.remove('hidden');
        } else {
            nextBtn.classList.remove('hidden');
            submitBtn.classList.add('hidden');
        }

        // Update progress bar
        const progressBar = document.querySelector(
            '.bg-brand-700.h-full'
        );

        if (progressBar) {
            progressBar.style.width = `${(currentStep / totalSteps) * 100}%`;
        }

        // Update step labels
        const stepLabels = document.querySelectorAll(
            '.grid.grid-cols-5.gap-2.text-center.text-xs.font-semibold span'
        );

        stepLabels.forEach((label, index) => {
            if (index + 1 === currentStep) {
                label.classList.remove('text-slate-500');
                label.classList.add('text-brand-800');
            } else {
                label.classList.remove('text-brand-800');
                label.classList.add('text-slate-500');
            }
        });

        // Scroll to form top
        const formContainer = document.getElementById('enrolmentForm');

        if (formContainer) {
            const top =
                formContainer.getBoundingClientRect().top +
                window.pageYOffset -
                100;

            window.scrollTo({
                top: top,
                behavior: 'smooth'
            });
        }
    }

    // NEXT
    nextBtn.addEventListener('click', function () {

        if (currentStep < totalSteps) {
            currentStep++;
            updateStep();
        }
    });

    // PREVIOUS
    prevBtn.addEventListener('click', function () {

        if (currentStep > 1) {
            currentStep--;
            updateStep();
        }
    });

    // SUBMIT
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // No validation here.
        // Add your Laravel submit/AJAX process later.

        alert('Application submitted successfully!');
    });

    // Initial state
    updateStep();
</script>


@endsection
