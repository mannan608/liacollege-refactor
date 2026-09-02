@extends('frontend.layouts.app')

@section('content')
<main class="min-h-screen bg-slate-50/70">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8 lg:py-14">
        {{-- Hero Section --}}
        <header class="mx-auto max-w-4xl pb-8 text-center lg:pb-10">           

            <div class="relative mx-auto max-w-3xl text-center">

                {{-- Badge --}}
                <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3.5 py-1.5 text-xs font-semibold text-brand-700">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-brand-400 opacity-60"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-brand-500"></span>
                    </span>

                    Student Document Center
                </div>

                {{-- Heading --}}
                <h1 class="text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                    Student Information
                </h1>

                <p class="mx-auto mt-4 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base sm:leading-7">
                    Access important student handbooks, policies, academic information,
                    forms, and official institutional documents in one convenient place.
                </p>

                {{-- Meta --}}
                <div class="mt-6 flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-xs font-medium text-slate-500">

                    <span class="inline-flex items-center gap-1.5">
                        <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 15v2m-6 4h12a2 2 0 002-2V9a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M8 7V5a4 4 0 118 0v2"/>
                        </svg>

                        Official Documents
                    </span>

                    <span class="hidden h-1 w-1 rounded-full bg-slate-300 sm:block"></span>

                    <span class="inline-flex items-center gap-1.5">
                        <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M3 7.5A2.5 2.5 0 015.5 5h4l2 2h7A2.5 2.5 0 0121 9.5v9A2.5 2.5 0 0118.5 21h-13A2.5 2.5 0 013 18.5v-11z"/>
                        </svg>

                        Student Resources
                    </span>

                    <span class="hidden h-1 w-1 rounded-full bg-slate-300 sm:block"></span>

                    <span class="inline-flex items-center gap-1.5">
                        <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 6v6l4 2"/>
                            <circle cx="12" cy="12" r="9"/>
                        </svg>

                        Always Available
                    </span>

                </div>

            </div>
        </header>
        {{-- Documents Section --}}
        <section class="mt-8 sm:mt-10">

            {{-- Section Header --}}
            <div class="mb-5 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>
                    <div class="flex items-center gap-2">
                        <span class="h-1.5 w-7 rounded-full bg-brand-500"></span>

                        <span class="text-xs font-bold uppercase tracking-wider text-brand-600">
                            Resources
                        </span>
                    </div>

                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-950 sm:text-3xl">
                        Student Handbook & Policies
                    </h2>

                    <p class="mt-1.5 max-w-2xl text-sm leading-6 text-slate-500">
                        Download official documentation, policies, academic resources,
                        and institutional procedures.
                    </p>
                </div>

                {{-- Document Count --}}
                <div class="inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-600 shadow-sm">
                    <svg class="h-4 w-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M14 3v6h6"/>
                    </svg>

                    4 Documents
                </div>

            </div>


            {{-- Documents Grid --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

                {{-- Student Handbook --}}
                <div class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">

                    <div class="p-5">

                        <div class="flex items-start justify-between">

                            {{-- PDF Icon --}}
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50 text-red-600 ring-1 ring-inset ring-red-100">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M6 2h8l5 5v15H6a2 2 0 01-2-2V4a2 2 0 012-2z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M14 2v6h6"/>
                                </svg>
                            </div>

                            <span class="rounded-full bg-red-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-red-600">
                                PDF
                            </span>

                        </div>

                        <h3 class="mt-5 text-base font-bold text-slate-900">
                            Student Handbook
                        </h3>

                        <p class="mt-2 text-xs leading-5 text-slate-500">
                            General student guidelines, campus information, rules,
                            and institutional policies.
                        </p>

                        <div class="mt-4 flex items-center gap-2 text-[11px] font-medium text-slate-400">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 6v6l4 2"/>
                                <circle cx="12" cy="12" r="9"/>
                            </svg>

                            Official Document
                        </div>

                    </div>

                    <div class="mt-auto border-t border-slate-100 bg-slate-50/70 p-4">
                        <button
                            type="button"
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-xs font-bold text-brand-700 shadow-sm ring-1 ring-inset ring-slate-200 transition-all hover:bg-brand-50 hover:ring-brand-200 active:scale-[0.98]"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 3v12m0 0l4-4m-4 4l-4-4M5 21h14"/>
                            </svg>

                            Download PDF
                        </button>
                    </div>

                </div>


                {{-- Complaints & Appeals --}}
                <div class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">

                    <div class="p-5">

                        <div class="flex items-start justify-between">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-50 text-orange-600 ring-1 ring-inset ring-orange-100">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M9 12h6m-6 4h4M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M14 3v6h6"/>
                                </svg>
                            </div>

                            <span class="rounded-full bg-red-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-red-600">
                                PDF
                            </span>

                        </div>

                        <h3 class="mt-5 text-base font-bold text-slate-900">
                            Complaints & Appeals Policy
                        </h3>

                        <p class="mt-2 text-xs leading-5 text-slate-500">
                            Procedures and guidelines regarding academic and
                            non-academic complaints and appeals.
                        </p>

                        <div class="mt-4 flex items-center gap-2 text-[11px] font-medium text-slate-400">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 6v6l4 2"/>
                                <circle cx="12" cy="12" r="9"/>
                            </svg>

                            Institutional Policy
                        </div>

                    </div>

                    <div class="mt-auto border-t border-slate-100 bg-slate-50/70 p-4">
                        <button
                            type="button"
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-xs font-bold text-brand-700 shadow-sm ring-1 ring-inset ring-slate-200 transition-all hover:bg-brand-50 hover:ring-brand-200 active:scale-[0.98]"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 3v12m0 0l4-4m-4 4l-4-4M5 21h14"/>
                            </svg>

                            Download PDF
                        </button>
                    </div>

                </div>


                {{-- Fees & Refunds --}}
                <div class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">

                    <div class="p-5">

                        <div class="flex items-start justify-between">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 ring-1 ring-inset ring-emerald-100">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H7"/>
                                </svg>
                            </div>

                            <span class="rounded-full bg-red-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-red-600">
                                PDF
                            </span>

                        </div>

                        <h3 class="mt-5 text-base font-bold text-slate-900">
                            Fees & Refunds Policy
                        </h3>

                        <p class="mt-2 text-xs leading-5 text-slate-500">
                            Information about fee schedules, payment procedures,
                            refunds, and related financial policies.
                        </p>

                        <div class="mt-4 flex items-center gap-2 text-[11px] font-medium text-slate-400">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 6v6l4 2"/>
                                <circle cx="12" cy="12" r="9"/>
                            </svg>

                            Financial Policy
                        </div>

                    </div>

                    <div class="mt-auto border-t border-slate-100 bg-slate-50/70 p-4">
                        <button
                            type="button"
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-xs font-bold text-brand-700 shadow-sm ring-1 ring-inset ring-slate-200 transition-all hover:bg-brand-50 hover:ring-brand-200 active:scale-[0.98]"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 3v12m0 0l4-4m-4 4l-4-4M5 21h14"/>
                            </svg>

                            Download PDF
                        </button>
                    </div>

                </div>


                {{-- Academic Calendar --}}
                <div class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-brand-200 hover:shadow-lg">

                    <div class="p-5">

                        <div class="flex items-start justify-between">

                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-50 text-violet-600 ring-1 ring-inset ring-violet-100">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="17" rx="2" stroke-width="1.8"/>
                                    <path stroke-linecap="round" stroke-width="1.8"
                                          d="M16 2v4M8 2v4M3 10h18"/>
                                </svg>
                            </div>

                            <span class="rounded-full bg-red-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-red-600">
                                PDF
                            </span>

                        </div>

                        <h3 class="mt-5 text-base font-bold text-slate-900">
                            Academic Calendar
                        </h3>

                        <p class="mt-2 text-xs leading-5 text-slate-500">
                            Important academic dates including terms, examinations,
                            holidays, and institutional events.
                        </p>

                        <div class="mt-4 flex items-center gap-2 text-[11px] font-medium text-slate-400">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 6v6l4 2"/>
                                <circle cx="12" cy="12" r="9"/>
                            </svg>

                            Academic Resource
                        </div>

                    </div>

                    <div class="mt-auto border-t border-slate-100 bg-slate-50/70 p-4">
                        <button
                            type="button"
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-xs font-bold text-brand-700 shadow-sm ring-1 ring-inset ring-slate-200 transition-all hover:bg-brand-50 hover:ring-brand-200 active:scale-[0.98]"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M12 3v12m0 0l4-4m-4 4l-4-4M5 21h14"/>
                            </svg>

                            Download PDF
                        </button>
                    </div>

                </div>

            </div>

        </section>
        {{-- Bottom Information Banner --}}
        <section class="mt-8 overflow-hidden rounded-2xl border border-brand-100 bg-brand-50/60 p-5 sm:p-6">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-brand-600 shadow-sm ring-1 ring-brand-100">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 100-20 10 10 0 000 20z"/>
                    </svg>
                </div>

                <div class="min-w-0">
                    <h3 class="text-sm font-bold text-slate-900">
                        Need help with a document?
                    </h3>

                    <p class="mt-1 text-xs leading-5 text-slate-500">
                        If you cannot find the information you need, please contact
                        the student support team for assistance.
                    </p>
                </div>

            </div>

        </section>
    </div>
   <!-- Qualifications Grid -->
    <section class="py-24 md:py-32 bg-surface-container-lowest reveal-on-scroll">
        <div class="px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
            <div class="text-center  mb-16">
                <h2 class="lg:text-6xl font-headline-lg md:text-5xl sm:text-4xl text-3xl font-bold text-on-surface mb-4">
                    Explore Our Qualifications</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant">Discover programs designed to equip
                    you with the skills demanded by today's leading employers.</p>
            </div>
            <div class=" mt-8 md:mt-12">
                <x-frontend.courses :courses="$courses->take(3)" />
            </div>
        </div>
    </section>
</main>

@endsection
