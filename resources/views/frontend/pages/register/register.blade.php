 @extends('frontend.layouts.app') @section('content')
     <main x-data="enrolmentWizard()" x-init="init()" class="min-h-screen bg-slate-50 py-0 md:py-6">
         <div class="max-w-6xl mx-auto px-0 sm:px-6 lg:px-8">
             {{-- ========================================================= HERO ========================================================== --}}
             <section
                 class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-brand-900 via-brand-800 to-slate-900">
                 <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-white/5"></div>
                 <div class="absolute -left-20 -bottom-32 h-80 w-80 rounded-full bg-brand-400/10"></div>
                 <div class="relative px-6 py-8 sm:px-10 sm:py-10 lg:px-12">
                     <div class="flex flex-col gap-7 lg:flex-row lg:items-center lg:justify-between">
                         <div class="max-w-3xl">
                             <div
                                 class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-3.5 py-1.5 text-xs font-semibold text-white">
                                 <span class="flex h-2 w-2 rounded-full bg-emerald-400"></span> Enrolment Portal
                             </div>
                             <h1 class="text-3xl font-bold tracking-tight text-white sm:text-4xl lg:text-5xl"> Student
                                 Enrolment </h1>
                             <p class="mt-4 max-w-2xl text-sm leading-6 text-white/75 sm:text-base"> Complete your enrolment
                                 application in a few simple steps. Your information will be securely processed by our
                                 admissions team. </p>
                             <div class="mt-6 flex flex-wrap gap-3">
                                 <div
                                     class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/10 px-3 py-2 text-xs font-medium text-white/90">
                                     <i class="fa-solid fa-shield-halved text-brand-200"></i> Secure application
                                 </div>
                                 <div
                                     class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/10 px-3 py-2 text-xs font-medium text-white/90">
                                     <i class="fa-solid fa-list-check text-brand-200"></i> 5 simple steps
                                 </div>
                             </div>
                         </div>
                         <div class="hidden shrink-0 lg:flex">
                             <div
                                 class="flex h-24 w-24 items-center justify-center rounded-3xl border border-white/10 bg-white/10 shadow-inner">
                                 <i class="fa-solid fa-graduation-cap text-4xl text-white"></i>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             {{-- ========================================================= WIZARD CARD ========================================================== --}}
             <section class="-mt-5 relative z-1">
                 <div class="overflow-hidden rounded-b-3xl border border-slate-200 bg-white ">
                     {{-- ================================================= PROGRESS ================================================== --}}
                     <div class="border-b border-slate-200 bg-white px-5 py-5 sm:px-8">
                         <div class="flex items-center justify-between gap-4">
                             <div>
                                 <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-slate-400"> Application
                                     Progress </p>
                                 <p class="mt-1 text-sm font-bold text-slate-900"> Step <span x-text="currentStep"></span>
                                     of
                                     <span x-text="totalSteps"></span>
                                 </p>
                             </div>
                             <div class="rounded-full bg-brand-50 px-3 py-1.5 text-xs font-bold text-brand-800"> <span
                                     x-text="progress"></span>% complete </div>
                         </div>
                         {{-- Progress Bar --}}
                         <div class="mt-5 h-2 overflow-hidden rounded-full bg-slate-100">
                             <div class="h-full rounded-full bg-brand-700 transition-all duration-500 ease-out"
                                 :style="`width: ${progress}%`"></div>
                         </div>
                         {{-- Desktop Steps --}}
                         <div class="mt-5 hidden grid-cols-5 gap-3 sm:grid"> <template x-for="step in steps"
                                 :key="step.id"> <button type="button" @click="goToStep(step.id)"
                                     class="group text-left">
                                     <div class="flex items-center gap-3">
                                         <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-xs font-bold transition-all duration-300"
                                             :class="{
                                                 'bg-brand-700 text-white shadow-md shadow-brand-700/20': currentStep ===
                                                     step.id,
                                                 'bg-brand-100 text-brand-800': currentStep > step
                                                     .id,
                                                 'bg-slate-100 text-slate-500': currentStep < step.id
                                             }">
                                             <template x-if="currentStep > step.id"> <i class="fa-solid fa-check"></i>
                                             </template> <template x-if="currentStep <= step.id"> <span
                                                     x-text="step.id"></span> </template>
                                         </div>
                                         <div class="min-w-0">
                                             <p class="truncate text-xs font-bold"
                                                 :class="currentStep === step.id ? 'text-brand-800' : 'text-slate-500'"
                                                 x-text="step.title"></p>
                                             <p class="mt-0.5 truncate text-[10px] text-slate-400" x-text="step.short"></p>
                                         </div>
                                     </div>
                                 </button> </template> </div>
                         {{-- Mobile Steps --}}
                         <div class="mt-5 flex items-center justify-between sm:hidden"> <template x-for="step in steps"
                                 :key="step.id">
                                 <div class="flex h-8 w-8 items-center justify-center rounded-full text-[11px] font-bold"
                                     :class="{
                                         'bg-brand-700 text-white': currentStep === step
                                             .id,
                                         'bg-brand-100 text-brand-800': currentStep > step
                                             .id,
                                         'bg-slate-100 text-slate-500': currentStep < step.id
                                     }">
                                     <template x-if="currentStep > step.id"> <i class="fa-solid fa-check"></i> </template>
                                     <template x-if="currentStep <= step.id"> <span x-text="step.id"></span> </template>
                                 </div>
                             </template> </div>
                     </div>
                     {{-- ================================================= FORM ================================================== --}}
                     <form id="enrolmentForm" @submit.prevent="submitApplication"
                         class="px-5 py-7 sm:px-8 sm:py-10 lg:px-12">
                         {{-- ================================================= STEP 1 ================================================== --}}
                         <div x-show="currentStep === 1" x-transition.opacity.duration.300ms class="space-y-8">
                             {{-- Before You Start --}}
                             <section class="overflow-hidden rounded-2xl border border-brand-100 bg-brand-25">
                                 <div class="border-b border-brand-100 px-5 py-5 sm:px-6">
                                     <div class="flex items-start gap-4">
                                         <div
                                             class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-brand-700 shadow-sm">
                                             <i class="fa-solid fa-circle-info"></i>
                                         </div>
                                         <div>
                                             <h2 class="text-lg font-bold text-slate-900"> Before You Start </h2>
                                             <p class="mt-1 text-sm leading-6 text-slate-600"> To complete this form you
                                                 will
                                                 need to have the following things handy: </p>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-6">
                                     <div class="rounded-2xl border border-brand-100 bg-white p-5">
                                         <div class="flex items-start gap-4">
                                             <div
                                                 class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                                 <i class="fa-solid fa-id-card"></i>
                                             </div>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> Unique Student Identifier
                                                 </h3>
                                                 <p class="mt-1 text-sm leading-6 text-slate-600"> Your Unique Student
                                                     Identifier (USI). </p>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="rounded-2xl border border-brand-100 bg-white p-5">
                                         <div class="flex items-start gap-4">
                                             <div
                                                 class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                                 <i class="fa-solid fa-passport"></i>
                                             </div>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> Photo ID </h3>
                                                 <p class="mt-1 text-sm leading-6 text-slate-600"> A picture or scan of your
                                                     Photo ID (e.g. Driver's License or Passport). </p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </section>
                             {{-- Enrolment Process --}}
                             <section>
                                 <div class="mb-5 flex items-center gap-3">
                                     <div
                                         class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-brand-700">
                                         <i class="fa-solid fa-route"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-lg font-bold text-slate-900"> The Enrolment Process </h2>
                                         <p class="text-xs text-slate-500"> Here's what happens after you apply. </p>
                                     </div>
                                 </div>
                                 <div class="grid gap-5 md:grid-cols-2">
                                     <div class="rounded-2xl border border-slate-200 bg-white p-5">
                                         <div class="flex gap-4"> <span
                                                 class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-700 text-xs font-bold text-white">
                                                 1 </span>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> Complete this form </h3>
                                                 <p class="mt-1 text-sm leading-6 text-slate-600"> Complete the enrolment
                                                     application with your personal, background and education information.
                                                 </p>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="rounded-2xl border border-slate-200 bg-white p-5">
                                         <div class="flex gap-4"> <span
                                                 class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-700 text-xs font-bold text-white">
                                                 2 </span>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> Application approval </h3>
                                                 <p class="mt-1 text-sm leading-6 text-slate-600"> Once approved, usually
                                                     the
                                                     same or the next working day, an invoice and welcome email will be sent
                                                     to you. </p>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="rounded-2xl border border-slate-200 bg-white p-5">
                                         <div class="flex gap-4"> <span
                                                 class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-700 text-xs font-bold text-white">
                                                 3 </span>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> Payment & online access
                                                 </h3>
                                                 <p class="mt-1 text-sm leading-6 text-slate-600"> Upon payment of your
                                                     initial fee, you will gain access to our dynamic online learning
                                                     system.
                                                 </p>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="rounded-2xl border border-slate-200 bg-white p-5">
                                         <div class="flex gap-4"> <span
                                                 class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-brand-700 text-xs font-bold text-white">
                                                 4 </span>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> Face-to-face training </h3>
                                                 <p class="mt-1 text-sm leading-6 text-slate-600"> If applicable, we will
                                                     confirm dates, times and locations for any face-to-face training. </p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </section>
                             {{-- Let's Get Started --}}
                             <section class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                 <div class="flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                                         <i class="fa-solid fa-rocket"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-lg font-bold text-slate-900"> Let's get started! </h2>
                                         <p class="mt-2 text-sm leading-7 text-slate-600"> Firstly, we need to confirm that
                                             you're ready to do the course. We'd love to have you join us – we need to
                                             ensure
                                             your eligibility and suitability to study. </p>
                                         <p class="mt-4 text-sm leading-7 text-slate-600"> To enrol, you must read,
                                             understand, and agree to the terms and conditions of studying with us. These
                                             include important things like privacy, entry requirements, responsibilities,
                                             refunds, and a code of conduct. </p>
                                         <div class="mt-4 rounded-xl bg-slate-50 p-4 text-xs leading-6 text-slate-500">
                                             They're necessarily quite detailed, but we've kept them as plain English as
                                             possible. </div>
                                     </div>
                                 </div>
                             </section>
                             {{-- Declarations --}}
                             <section>
                                 <div class="mb-5 flex items-center gap-3">
                                     <div
                                         class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                         <i class="fa-solid fa-file-contract"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-lg font-bold text-slate-900"> Declarations & Acknowledgements
                                         </h2>
                                         <p class="text-xs text-slate-500"> Please read each statement carefully. </p>
                                     </div>
                                 </div>
                                 <div class="space-y-3"> <template x-for="(declaration, index) in declarations"
                                         :key="index"> <label
                                             class="group block cursor-pointer rounded-2xl border border-slate-200 bg-white p-5 transition-all hover:border-brand-200 hover:bg-brand-25">
                                             <div class="flex gap-4">
                                                 <div class="pt-0.5"> <input type="checkbox"
                                                         :name="`declaration_${index + 1}`"
                                                         class="h-5 w-5 rounded border-slate-300 text-brand-700 focus:ring-brand-600">
                                                 </div>
                                                 <div>
                                                     <p class="text-sm font-medium leading-6 text-slate-700"
                                                         x-text="declaration.text"></p> <span
                                                         class="mt-3 inline-flex items-center rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600"
                                                         x-text="declaration.label"></span>
                                                 </div>
                                             </div>
                                         </label> </template> </div>
                             </section>
                         </div> {{-- ================================================= STEP 2 ================================================== --}} <div x-show="currentStep === 2" x-transition.opacity.duration.300ms
                             class="space-y-8"> {{-- Personal Information --}} <section>
                                 <div class="mb-6 flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                         <i class="fa-solid fa-user"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-xl font-bold text-slate-900"> Personal Information </h2>
                                         <p class="mt-1 text-sm text-slate-500"> Please provide your legal name and
                                             personal
                                             details. </p>
                                     </div>
                                 </div>
                                 <div class="space-y-6">
                                     <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-5 sm:p-6">
                                         <div class="mb-5">
                                             <h3 class="text-sm font-bold text-slate-900"> Legal Name </h3>
                                             <p class="mt-1 text-xs text-slate-500"> Enter your name exactly as it appears
                                                 on your official identity document. </p>
                                         </div>
                                         <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                                             <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Prefix
                                                 </label> <select name="prefix"
                                                     class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                                     <option value="">Select</option>
                                                     <option>Mr</option>
                                                     <option>Mrs</option>
                                                     <option>Ms</option>
                                                     <option>Dr</option>
                                                 </select> </div>
                                             <div> <label class="mb-2 block text-xs font-bold text-slate-600"> First given
                                                     name </label> <input type="text" name="first_name"
                                                     value="Md Abdul" placeholder="First given name"
                                                     class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                             </div>
                                             <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Middle name
                                                 </label> <input type="text" name="middle_name"
                                                     placeholder="Middle name"
                                                     class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                             </div>
                                             <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Family name
                                                 </label> <input type="text" name="family_name" value="rok"
                                                     placeholder="Family name"
                                                     class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                             </div>
                                         </div>
                                         <div class="mt-5"> <label class="mb-2 block text-xs font-bold text-slate-600">
                                                 Full Legal Name Format Verification </label> <input type="text"
                                                 name="full_legal_name"
                                                 placeholder="As shown on Passport, Driver's License, etc."
                                                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                         </div>
                                     </div> {{-- Contact --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <div class="mb-5">
                                             <h3 class="text-sm font-bold text-slate-900"> Contact Details </h3>
                                         </div>
                                         <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                             <div class="sm:col-span-2"> <label
                                                     class="mb-2 block text-xs font-bold text-slate-600"> Preferred Name
                                                 </label> <input type="text" name="preferred_name"
                                                     placeholder="E.g. Bob instead of Robert, Tess instead of Theresa"
                                                     class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                             </div>
                                             <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Email
                                                     Address
                                                 </label> <input type="email" name="email"
                                                     placeholder="you@example.com"
                                                     class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                             </div>
                                             <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Phone Number
                                                 </label> <input type="tel" name="phone" placeholder="Phone number"
                                                     class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                             </div>
                                             <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Date of
                                                     Birth
                                                 </label> <input type="date" name="date_of_birth" value="2026-01-09"
                                                     class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                             </div>
                                             <div> <label class="mb-3 block text-xs font-bold text-slate-600"> Gender
                                                 </label>
                                                 <div class="grid grid-cols-3 gap-4">

                                                     <label
                                                         class="cursor-pointer flex items-start gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-center text-xs font-semibold text-slate-700 transition hover:border-brand-300 hover:bg-brand-25">
                                                         <input type="radio" name="gender" value="Male"> Male
                                                     </label>
                                                     <label
                                                         class="cursor-pointer flex items-start gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-center text-xs font-semibold text-slate-700 transition hover:border-brand-300 hover:bg-brand-25">
                                                         <input type="radio" name="gender" value="Female"> Female
                                                     </label>
                                                     <label
                                                         class="cursor-pointer flex items-start gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-center text-xs font-semibold text-slate-700 transition hover:border-brand-300 hover:bg-brand-25">
                                                         <input type="radio" name="gender" value="Other"> Other
                                                     </label>
                                                 </div>
                                             </div>
                                         </div>
                                     </div> {{-- Residential Address --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <div class="mb-5 flex items-start gap-3">
                                             <div
                                                 class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                                 <i class="fa-solid fa-location-dot"></i>
                                             </div>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> Residential Address </h3>
                                                 <p class="mt-1 text-xs leading-5 text-slate-500"> Your usual place of
                                                     residence. </p>
                                             </div>
                                         </div>
                                         <div class="space-y-5">
                                             <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Building or
                                                     Property Name </label> <input type="text" name="building_name"
                                                     value="mannan" placeholder="Building or property name"
                                                     class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                             </div>
                                             <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Unit or
                                                         Flat Number </label> <input type="text" name="unit_number"
                                                         placeholder="Unit / flat number"
                                                         class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Street
                                                         Number </label> <input type="text" name="street_number"
                                                         value="120" placeholder="Street number"
                                                         class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                             </div>
                                             <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Street
                                                         Name </label> <input type="text" name="street_name"
                                                         value="raf" placeholder="Street name"
                                                         class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Suburb,
                                                         Locality or Town </label> <input type="text" name="suburb"
                                                         value="fff" placeholder="Suburb / locality / town"
                                                         class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Postcode
                                                     </label> <input type="text" name="postcode" value="1207"
                                                         placeholder="Postcode"
                                                         class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                             </div>
                                             <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Country
                                                     </label> <select name="country"
                                                         class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                                         <option>Austria</option>
                                                         <option>Australia</option>
                                                         <option>Bangladesh</option>
                                                         <option>United States</option>
                                                         <option>United Kingdom</option>
                                                         <option>Canada</option>
                                                         <option>Other</option>
                                                     </select> </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600">
                                                         State/Territory </label> <select name="state"
                                                         class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                                         <option>Victoria</option>
                                                         <option>New South Wales</option>
                                                         <option>Queensland</option>
                                                         <option>Western Australia</option>
                                                         <option>South Australia</option>
                                                         <option>Tasmania</option>
                                                         <option>Australian Capital Territory</option>
                                                         <option>Northern Territory</option>
                                                     </select> </div>
                                             </div>
                                         </div>
                                     </div> {{-- Postal Address --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <div class="mb-5">
                                             <h3 class="text-sm font-bold text-slate-900"> Do you have a separate postal
                                                 address? </h3>
                                             <p class="mt-1 text-xs text-slate-500"> Select Yes only if your postal address
                                                 is different from your residential address. </p>
                                         </div>
                                         <div class="grid grid-cols-1 gap-5 sm:grid-cols-2"> <label
                                                 class="cursor-pointer rounded-2xl border p-4 transition-all"
                                                 :class="postalAddress === 'same' ?
                                                     'border-brand-400 bg-brand-25 ring-2 ring-brand-100' :
                                                     'border-slate-200 bg-white hover:border-brand-200'">
                                                 <input type="radio" name="postal_address" value="same"
                                                     x-model="postalAddress" class="sr-only">
                                                 <div class="flex items-start gap-3">
                                                     <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full"
                                                         :class="postalAddress === 'same' ? 'bg-brand-700 text-white' :
                                                             'bg-slate-100 text-slate-400'">
                                                         <i class="fa-solid fa-check text-xs"></i>
                                                     </div>
                                                     <div>
                                                         <p class="text-sm font-bold text-slate-900"> No - use my address
                                                             above </p>
                                                         <p class="mt-1 text-xs leading-5 text-slate-500"> My postal
                                                             address
                                                             is the same. </p>
                                                     </div>
                                                 </div>
                                             </label> <label class="cursor-pointer rounded-2xl border p-4 transition-all"
                                                 :class="postalAddress === 'different' ?
                                                     'border-brand-400 bg-brand-25 ring-2 ring-brand-100' :
                                                     'border-slate-200 bg-white hover:border-brand-200'">
                                                 <input type="radio" name="postal_address" value="different"
                                                     x-model="postalAddress" class="sr-only">
                                                 <div class="flex items-start gap-3">
                                                     <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full"
                                                         :class="postalAddress === 'different' ? 'bg-brand-700 text-white' :
                                                             'bg-slate-100 text-slate-400'">
                                                         <i class="fa-solid fa-envelope text-xs"></i>
                                                     </div>
                                                     <div>
                                                         <p class="text-sm font-bold text-slate-900"> Yes - enter details
                                                         </p>
                                                         <p class="mt-1 text-xs leading-5 text-slate-500"> My postal
                                                             address
                                                             is different. </p>
                                                     </div>
                                                 </div>
                                             </label> </div> {{-- Conditional Postal Fields --}} <div
                                             x-show="postalAddress === 'different'" x-transition
                                             class="mt-6 rounded-2xl border border-brand-100 bg-brand-25 p-5 sm:p-6">
                                             <div class="mb-5 flex items-center gap-3">
                                                 <div
                                                     class="flex h-10 w-10 items-center justify-center rounded-xl bg-white text-brand-700">
                                                     <i class="fa-solid fa-envelopes-bulk"></i>
                                                 </div>
                                                 <div>
                                                     <h4 class="text-sm font-bold text-slate-900"> Postal Address </h4>
                                                     <p class="text-xs text-slate-500"> Only if different from above. </p>
                                                 </div>
                                             </div>
                                             <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Unit or
                                                         flat number </label> <input type="text" name="postal_unit"
                                                         placeholder="Unit or flat number"
                                                         class=" placeholder:text-slate-400 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Street
                                                         Number </label> <input type="text" name="postal_street_number"
                                                         placeholder="Street number"
                                                         class=" placeholder:text-slate-400 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                                 <div class="sm:col-span-2"> <label
                                                         class="mb-2 block text-xs font-bold text-slate-600"> Street Name
                                                     </label> <input type="text" name="postal_street_name"
                                                         placeholder="Street name"
                                                         class=" placeholder:text-slate-400 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Suburb,
                                                         locality or town </label> <input type="text"
                                                         name="postal_suburb" placeholder="Suburb, locality or town"
                                                         class=" placeholder:text-slate-400 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Postcode
                                                     </label> <input type="text" name="postal_postcode"
                                                         placeholder="Postcode"
                                                         class=" placeholder:text-slate-400 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                                 </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Country
                                                     </label> <select name="postal_country"
                                                         class=" placeholder:text-slate-400 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                                         <option>Australia</option>
                                                         <option>Austria</option>
                                                         <option>Bangladesh</option>
                                                         <option>United States</option>
                                                         <option>United Kingdom</option>
                                                         <option>Canada</option>
                                                     </select> </div>
                                                 <div> <label class="mb-2 block text-xs font-bold text-slate-600">
                                                         State/Territory </label> <select name="postal_state"
                                                         class=" placeholder:text-slate-400 w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                                         <option>Victoria</option>
                                                         <option>New South Wales</option>
                                                         <option>Queensland</option>
                                                         <option>Western Australia</option>
                                                         <option>South Australia</option>
                                                         <option>Tasmania</option>
                                                     </select> </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </section>
                         </div> {{-- ================================================= STEP 3 ================================================== --}} <div x-show="currentStep === 3" x-transition.opacity.duration.300ms
                             class="space-y-8"> {{-- Language and Cultural Diversity --}} <section>
                                 <div class="mb-6 flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                         <i class="fa-solid fa-earth-americas"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-xl font-bold text-slate-900"> Language & Cultural Diversity </h2>
                                         <p class="mt-1 text-sm text-slate-500"> Help us understand your background and
                                             support your learning experience. </p>
                                     </div>
                                 </div>
                                 <div class="space-y-5"> {{-- Country Born --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <p class="text-sm font-bold text-slate-900"> In which country were you born? </p>
                                         <div class="mt-4 grid gap-5 sm:grid-cols-2"> <label
                                                 class="cursor-pointer rounded-xl border p-4 transition"
                                                 :class="bornCountry === 'Australia' ? 'border-brand-400 bg-brand-25' :
                                                     'border-slate-200 hover:border-brand-200'">
                                                 <input type="radio" name="born" value="Australia"
                                                     x-model="bornCountry" class="sr-only">
                                                 <div class="flex items-center gap-3"> <i class="fa-solid fa-flag"
                                                         :class="bornCountry === 'Australia' ? 'text-brand-700' :
                                                             'text-slate-400'"></i>
                                                     <span class="text-sm font-semibold text-slate-700"> Australia </span>
                                                 </div>
                                             </label> <label class="cursor-pointer rounded-xl border p-4 transition"
                                                 :class="bornCountry === 'Other' ? 'border-brand-400 bg-brand-25' :
                                                     'border-slate-200 hover:border-brand-200'">
                                                 <input type="radio" name="born" value="Other"
                                                     x-model="bornCountry" class="sr-only">
                                                 <div class="flex items-center gap-3"> <i
                                                         class="fa-solid fa-earth-americas"
                                                         :class="bornCountry === 'Other' ? 'text-brand-700' :
                                                             'text-slate-400'"></i>
                                                     <span class="text-sm font-semibold text-slate-700"> Other </span>
                                                 </div>
                                             </label> </div>
                                         <div x-show="bornCountry === 'Other'" x-transition class="mt-4"> <label
                                                 class="mb-2 block text-xs font-bold text-slate-600"> Country of birth
                                             </label> <input type="text" name="other_birth_country"
                                                 placeholder="Enter your country of birth"
                                                 class="w-full placeholder:text-slate-400 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                         </div>
                                     </div> {{-- Language --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <p class="text-sm font-bold text-slate-900"> Do you speak a language other than
                                             English at home? </p>
                                         <p class="mt-1 text-xs leading-5 text-slate-500"> If more than one language,
                                             indicate the one that is spoken most often. </p>
                                         <div class="mt-4 grid gap-5 sm:grid-cols-2mt-4 grid gap-5 sm:grid-cols-2"> <label
                                                 class="cursor-pointer rounded-xl border p-4 transition"
                                                 :class="homeLanguage === 'english' ? 'border-brand-400 bg-brand-25' :
                                                     'border-slate-200 hover:border-brand-200'">
                                                 <input type="radio" name="language" value="english"
                                                     x-model="homeLanguage" class="sr-only">
                                                 <div class="flex items-center gap-3"> <i
                                                         class="fa-solid fa-check text-brand-700"></i> <span
                                                         class="text-sm font-semibold text-slate-700"> No, English only
                                                     </span> </div>
                                             </label> <label class="cursor-pointer rounded-xl border p-4 transition"
                                                 :class="homeLanguage === 'other' ? 'border-brand-400 bg-brand-25' :
                                                     'border-slate-200 hover:border-brand-200'">
                                                 <input type="radio" name="language" value="other"
                                                     x-model="homeLanguage" class="sr-only">
                                                 <div class="flex items-center gap-3"> <i
                                                         class="fa-solid fa-language text-brand-700"></i> <span
                                                         class="text-sm font-semibold text-slate-700"> Yes, other </span>
                                                 </div>
                                             </label> </div>
                                         <div x-show="homeLanguage === 'other'" x-transition class="mt-4"> <label
                                                 class="mb-2 block text-xs font-bold text-slate-600"> Language spoken most
                                                 often </label> <input type="text" name="other_language"
                                                 placeholder="Enter language"
                                                 class="w-full placeholder:text-slate-400 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100">
                                         </div>
                                     </div> {{-- Indigenous --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <p class="text-sm font-bold text-slate-900"> Are you of Aboriginal or Torres
                                             Strait Islander origin? </p>
                                         <div class="mt-4 grid gap-5 sm:grid-cols-2mt-4 grid gap-5 sm:grid-cols-2"> <template
                                                 x-for="option in indigenousOptions" :key="option"> <label
                                                     class="cursor-pointer rounded-xl border p-4 transition"
                                                     :class="indigenous === option ? 'border-brand-400 bg-brand-25' :
                                                         'border-slate-200 hover:border-brand-200'">
                                                     <input type="radio" name="indigenous" :value="option"
                                                         x-model="indigenous" class="sr-only">
                                                     <div class="flex items-center gap-3"> <span
                                                             class="flex h-5 w-5 items-center justify-center rounded-full border"
                                                             :class="indigenous === option ? 'border-brand-700 bg-brand-700' :
                                                                 'border-slate-300'">
                                                             <span x-show="indigenous === option"
                                                                 class="h-2 w-2 rounded-full bg-white"></span> </span>
                                                         <span class="text-sm font-medium text-slate-700"
                                                             x-text="option"></span>
                                                     </div>
                                                 </label> </template> </div>
                                     </div> {{-- Disability --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <p class="text-sm font-bold text-slate-900"> Do you consider yourself to have a
                                             disability, impairment or long-term condition? </p>
                                         <div class="mt-4 grid gap-5 sm:grid-cols-2mt-4 grid gap-5 sm:grid-cols-2">
                                             <label class="cursor-pointer rounded-xl border p-4 transition"
                                                 :class="disability === 'No' ? 'border-brand-400 bg-brand-25' :
                                                     'border-slate-200 hover:border-brand-200'">
                                                 <input type="radio" name="disability" value="No"
                                                     x-model="disability" > <span
                                                     class="text-sm font-semibold text-slate-700"> No </span> </label>
                                             <label class="cursor-pointer rounded-xl border p-4 transition"
                                                 :class="disability === 'Yes' ? 'border-brand-400 bg-brand-25' :
                                                     'border-slate-200 hover:border-brand-200'">
                                                 <input type="radio" name="disability" value="Yes"
                                                     x-model="disability" > <span
                                                     class="text-sm font-semibold text-slate-700"> Yes </span> </label>
                                         </div>
                                     </div>
                                 </div>
                             </section> {{-- Schooling --}} <section>
                                 <div class="mb-6 flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                         <i class="fa-solid fa-school"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-xl font-bold text-slate-900"> Schooling Background </h2>
                                         <p class="mt-1 text-sm text-slate-500"> Tell us about your secondary education.
                                         </p>
                                     </div>
                                 </div>
                                 <div class="space-y-5"> {{-- School Level --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <p class="text-sm font-bold text-slate-900"> What is your highest completed school
                                             level? </p>
                                         <div class="mt-4 grid gap-5 sm:grid-cols-2"> @php $levels = [ 'Year 12 or equivalent', 'Year 11 or equivalent', 'Year 10 or equivalent', 'Year 9 or equivalent', 'Year 8 or below', 'Never attended school', 'Never completed any primary or secondary level education', 'Not specified', ]; @endphp @foreach ($levels as $index => $level)
                                                 <label
                                                     class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-3.5 text-sm text-slate-700 transition hover:border-brand-200 hover:bg-brand-25">
                                                     <input type="radio" name="school_level"
                                                         value="{{ $level }}" @checked($index === 0)
                                                         class="h-4 w-4 border-slate-300 text-brand-700 focus:ring-brand-600">
                                                     <span>{{ $level }}</span> </label>
                                             @endforeach
                                         </div>
                                     </div> {{-- Secondary Enrollment --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <p class="text-sm font-bold text-slate-900"> Are you still enrolled in secondary
                                             or senior secondary education? </p>
                                         <div class="mt-4 grid gap-5 sm:grid-cols-2mt-4 grid gap-5 sm:grid-cols-2"> <label
                                                 class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-4 hover:border-brand-200 hover:bg-brand-25">
                                                 <input type="radio" name="enrolled_secondary" value="No" checked
                                                     class="h-4 w-4 border-slate-300 text-brand-700 focus:ring-brand-600">
                                                 <span class="text-sm font-semibold text-slate-700"> No </span> </label>
                                             <label
                                                 class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-4 hover:border-brand-200 hover:bg-brand-25">
                                                 <input type="radio" name="enrolled_secondary" value="Yes"
                                                     class="h-4 w-4 border-slate-300 text-brand-700 focus:ring-brand-600">
                                                 <span class="text-sm font-semibold text-slate-700"> Yes </span> </label>
                                         </div>
                                     </div>
                                 </div>
                             </section>
                         </div> {{-- ================================================= STEP 4 ================================================== --}} <div x-show="currentStep === 4" x-transition.opacity.duration.300ms
                             class="space-y-8"> {{-- Qualifications --}} <section>
                                 <div class="mb-6 flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                         <i class="fa-solid fa-award"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-xl font-bold text-slate-900"> Qualifications </h2>
                                         <p class="mt-1 text-sm text-slate-500"> Tell us about your previous
                                             qualifications.
                                         </p>
                                     </div>
                                 </div>
                                 <div class="space-y-5"> {{-- Post Secondary --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <p class="text-sm font-bold text-slate-900"> Do you have post-secondary
                                             qualifications? </p>
                                         <div class="mt-4 grid gap-5 sm:grid-cols-2mt-4 grid gap-5 sm:grid-cols-2"> <label
                                                 class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-4 hover:border-brand-200 hover:bg-brand-25">
                                                 <input type="radio" name="post_secondary" value="No" checked
                                                     class="h-4 w-4 border-slate-300 text-brand-700 focus:ring-brand-600">
                                                 <span class="text-sm font-semibold text-slate-700"> No </span> </label>
                                             <label
                                                 class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-4 hover:border-brand-200 hover:bg-brand-25">
                                                 <input type="radio" name="post_secondary" value="Yes"
                                                     class="h-4 w-4 border-slate-300 text-brand-700 focus:ring-brand-600">
                                                 <span class="text-sm font-semibold text-slate-700"> Yes </span> </label>
                                         </div>
                                     </div> {{-- Qualification Level --}} <div
                                         class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                         <p class="text-sm font-bold text-slate-900"> Select the HIGHEST level of
                                             qualification completed: </p>
                                         <div class="mt-4 grid gap-5 sm:grid-cols-2"> @php $qualifications = [ 'Bachelor Degree or Higher Degree', 'Advanced Diploma or Associate Degree', 'Diploma (or Associate Diploma)', 'Certificate IV (or advanced certificate/technician)', 'Certificate III (or trade certificate)', 'Certificate II', 'Certificate I', 'Certificates other than the above', ]; @endphp @foreach ($qualifications as $index => $qualification)
                                                 <label
                                                     class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-3.5 text-sm text-slate-700 transition hover:border-brand-200 hover:bg-brand-25">
                                                     <input type="radio" name="qualification_level"
                                                         value="{{ $qualification }}" @checked($index === 1)
                                                         class="h-4 w-4 border-slate-300 text-brand-700 focus:ring-brand-600">
                                                     <span>{{ $qualification }}</span> </label>
                                             @endforeach
                                         </div>
                                     </div>
                                 </div>
                             </section> {{-- Employment --}} <section>
                                 <div class="mb-6 flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                         <i class="fa-solid fa-user-tie"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-xl font-bold text-slate-900"> Employment Status </h2>
                                         <p class="mt-1 text-sm text-slate-500"> Which category best describes your current
                                             employment status? </p>
                                     </div>
                                 </div>
                                 <div class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                     <div class="grid gap-5 sm:grid-cols-2"> @php $statuses = [ 'Full-time employee', 'Part-time employee', 'Self-employed - not employing others', 'Employer', 'Employed - unpaid worker in family business', 'Unemployed - seeking full-time work', 'Unemployed - seeking part-time work', 'Not employed - not seeking employment', ]; @endphp @foreach ($statuses as $index => $status)
                                             <label
                                                 class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-3.5 text-sm text-slate-700 transition hover:border-brand-200 hover:bg-brand-25">
                                                 <input type="radio" name="employment_status"
                                                     value="{{ $status }}" @checked($index === 0)
                                                     class="h-4 w-4 border-slate-300 text-brand-700 focus:ring-brand-600">
                                                 <span>{{ $status }}</span> </label>
                                         @endforeach
                                     </div>
                                 </div>
                             </section> {{-- Main Reason --}} <section>
                                 <div class="mb-6 flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                         <i class="fa-solid fa-lightbulb"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-xl font-bold text-slate-900"> Main Reason for Study </h2>
                                         <p class="mt-1 text-sm text-slate-500"> Which category best describes the main
                                             reason for undertaking this course? </p>
                                     </div>
                                 </div>
                                 <div class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                     <div class="grid gap-5 sm:grid-cols-2"> @php $reasons = [ 'To get a job', 'To develop my existing business', 'To start my own business', 'To try for a different career', 'To get a better job or promotion', 'It was a requirement of my job', 'I wanted extra skills for my job', 'To get into another course of study', 'For personal interest or self-development', 'To get skills for community/voluntary work', 'Other reasons', ]; @endphp @foreach ($reasons as $index => $reason)
                                             <label
                                                 class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 p-3.5 text-sm text-slate-700 transition hover:border-brand-200 hover:bg-brand-25">
                                                 <input type="radio" name="study_reason" value="{{ $reason }}"
                                                     @checked($index === 0)
                                                     class="h-4 w-4 border-slate-300 text-brand-700 focus:ring-brand-600">
                                                 <span>{{ $reason }}</span> </label>
                                         @endforeach
                                     </div>
                                 </div>
                             </section>
                         </div> {{-- ================================================= STEP 5 ================================================== --}} <div x-show="currentStep === 5" x-transition.opacity.duration.300ms
                             class="space-y-8"> {{-- Final Review --}} <section
                                 class="rounded-2xl border border-brand-100 bg-brand-25 p-5 sm:p-6">
                                 <div class="flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-brand-700 shadow-sm">
                                         <i class="fa-solid fa-clipboard-check"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-xl font-bold text-slate-900"> Final Review </h2>
                                         <p class="mt-1 text-sm leading-6 text-slate-600"> You're almost done. Review your
                                             information before submitting your enrolment application. </p>
                                     </div>
                                 </div>
                             </section> {{-- Course Fees --}} <section>
                                 <div class="mb-6 flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-brand-50 text-brand-700">
                                         <i class="fa-solid fa-receipt"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-xl font-bold text-slate-900"> Course Fees </h2>
                                         <p class="mt-1 text-sm text-slate-500"> Tell us who will be responsible for paying
                                             your course fees. </p>
                                     </div>
                                 </div>
                                 <div class="grid gap-5 sm:grid-cols-2"> <label
                                         class="cursor-pointer rounded-2xl border p-5 transition-all"
                                         :class="feePayer === 'self' ?
                                             'border-brand-400 bg-brand-25 ring-2 ring-brand-100' :
                                             'border-slate-200 bg-white hover:border-brand-200'">
                                         <input type="radio" name="fees" value="self" x-model="feePayer"
                                             class="sr-only">
                                         <div class="flex items-start gap-4">
                                             <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl"
                                                 :class="feePayer === 'self' ? 'bg-brand-700 text-white' :
                                                     'bg-slate-100 text-slate-500'">
                                                 <i class="fa-solid fa-user"></i>
                                             </div>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> I'm paying for this course
                                                     myself </h3>
                                                 <p class="mt-1 text-xs leading-5 text-slate-500"> I will personally pay
                                                     the
                                                     course fees. </p>
                                             </div>
                                         </div>
                                     </label> <label class="cursor-pointer rounded-2xl border p-5 transition-all"
                                         :class="feePayer === 'organisation' ?
                                             'border-brand-400 bg-brand-25 ring-2 ring-brand-100' :
                                             'border-slate-200 bg-white hover:border-brand-200'">
                                         <input type="radio" name="fees" value="organisation" x-model="feePayer"
                                             class="sr-only">
                                         <div class="flex items-start gap-4">
                                             <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl"
                                                 :class="feePayer === 'organisation' ? 'bg-brand-700 text-white' :
                                                     'bg-slate-100 text-slate-500'">
                                                 <i class="fa-solid fa-building"></i>
                                             </div>
                                             <div>
                                                 <h3 class="text-sm font-bold text-slate-900"> Someone else is paying </h3>
                                                 <p class="mt-1 text-xs leading-5 text-slate-500"> E.g. my company or
                                                     another organisation. </p>
                                             </div>
                                         </div>
                                     </label> </div> {{-- Conditional Payment Contact --}} <div x-show="feePayer === 'organisation'"
                                     x-transition class="mt-5 rounded-2xl border border-brand-100 bg-brand-25 p-5 sm:p-6">
                                     <div class="mb-5 flex items-start gap-3">
                                         <div
                                             class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white text-brand-700">
                                             <i class="fa-solid fa-building-circle-check"></i>
                                         </div>
                                         <div>
                                             <h3 class="text-sm font-bold text-slate-900"> Payment Contact Details </h3>
                                             <p class="mt-1 text-xs leading-5 text-slate-500"> Please provide the details
                                                 of
                                                 the person or organisation responsible for paying your fees. </p>
                                         </div>
                                     </div>
                                     <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                         <div class="sm:col-span-2"> <label
                                                 class="mb-2 block text-xs font-bold text-slate-600"> Organisation paying
                                             </label> <input type="text" name="organisation_paying"
                                                 placeholder="Organisation name"
                                                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none placeholder:text-slate-400 focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                         </div>
                                         <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Name of contact
                                                 person </label> <input type="text" name="payment_contact_name"
                                                 placeholder="Full name"
                                                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none placeholder:text-slate-400 focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                         </div>
                                         <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Payment Contact
                                                 Email </label> <input type="email" name="payment_contact_email"
                                                 placeholder="name@example.com"
                                                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none placeholder:text-slate-400 focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                         </div>
                                         <div> <label class="mb-2 block text-xs font-bold text-slate-600"> Phone </label>
                                             <input type="tel" name="payment_contact_phone"
                                                 placeholder="Phone number"
                                                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 outline-none placeholder:text-slate-400 focus:border-brand-400 focus:ring-4 focus:ring-brand-100">
                                         </div>
                                     </div>
                                 </div>
                             </section> {{-- Anything Else --}} <section
                                 class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
                                 <div class="mb-5 flex items-start gap-4">
                                     <div
                                         class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-slate-100 text-brand-700">
                                         <i class="fa-solid fa-message"></i>
                                     </div>
                                     <div>
                                         <h2 class="text-lg font-bold text-slate-900"> Additional Information </h2>
                                         <p class="mt-1 text-xs leading-5 text-slate-500"> Is there anything else you would
                                             like us to know? </p>
                                     </div>
                                 </div>
                                 <textarea name="additional_information" rows="5"
                                     placeholder="Enter any additional requirements, comments, or notes here..."
                                     class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:ring-4 focus:ring-brand-100"></textarea>
                             </section>
                             {{-- Submission Notice --}}
                             <section class="rounded-2xl border border-emerald-100 bg-emerald-50 p-5">
                                 <div class="flex items-start gap-3">
                                     <div
                                         class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-white text-emerald-600 shadow-sm">
                                         <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                             <path stroke-linecap="round" stroke-linejoin="round"
                                                 d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                         </svg>
                                     </div>
                                     <div>
                                         <h3 class="text-sm font-bold text-emerald-900">Ready to submit?</h3>
                                         <p class="mt-1 text-xs leading-6 text-emerald-800/80">
                                             Once you submit your application, our admissions team will review the
                                             information and contact you regarding the next steps.
                                         </p>
                                     </div>
                                 </div>
                             </section>
                         </div> {{-- ================================================= NAVIGATION ================================================== --}} <div
                             class="mt-10 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:items-center sm:justify-between">
                             {{-- Previous --}} <button type="button" x-show="currentStep > 1" x-transition
                                 @click="previousStep()"
                                 class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-50 sm:w-auto">
                                 <i class="fa-solid fa-arrow-left"></i> Previous </button>
                             <div class="flex w-full sm:ml-auto sm:w-auto"> {{-- NEXT --}} <button type="button"
                                     x-show="currentStep < totalSteps" x-transition @click="nextStep()"
                                     class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-800 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-brand-800/20 transition hover:bg-brand-900 focus:outline-none focus:ring-4 focus:ring-brand-200 sm:w-auto">
                                     Continue <i class="fa-solid fa-arrow-right"></i> </button> {{-- SUBMIT - ONLY FINAL STEP --}}
                                 <button type="submit" x-show="currentStep === totalSteps" x-transition
                                     class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 px-7 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-700 focus:outline-none focus:ring-4 focus:ring-emerald-200 sm:w-auto">
                                     <i class="fa-solid fa-paper-plane"></i> Submit Application </button>
                             </div>
                         </div>
                     </form>
                 </div>
             </section>
         </div>
         {{-- ============================================================= SUBMISSION SUCCESS MODAL ============================================================== --}}
         <div x-show="submitted" x-transition.opacity
             class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/60 px-4 backdrop-blur-sm"
             style="display:none;">
             <div @click.outside="submitted = false"
                 class="w-full max-w-md rounded-3xl bg-white p-7 text-center shadow-2xl sm:p-9">
                 <div
                     class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                     <i class="fa-solid fa-check text-2xl"></i>
                 </div>
                 <h2 class="mt-5 text-2xl font-bold text-slate-900"> Application Submitted </h2>
                 <p class="mt-3 text-sm leading-6 text-slate-500"> Your enrolment application has been submitted
                     successfully. Our admissions team will review your application and contact you with the next steps.
                 </p>
                 <button type="button" @click="submitted = false"
                     class="mt-7 inline-flex items-center justify-center rounded-xl bg-brand-800 px-6 py-3 text-sm font-bold text-white hover:bg-brand-900">
                     Done </button>
             </div>
         </div>
     </main> {{-- ============================================================= ALPINE.JS ============================================================== --}}
     <script>
         function enrolmentWizard() {
             return {
                 currentStep: 1,
                 totalSteps: 5,
                 submitted: false,
                 postalAddress: 'same',
                 bornCountry: 'Australia',
                 homeLanguage: 'english',
                 indigenous: 'No',
                 disability: 'No',
                 feePayer: 'self',
                 steps: [{
                     id: 1,
                     title: 'Getting Started',
                     short: 'Terms & declarations'
                 }, {
                     id: 2,
                     title: 'Personal',
                     short: 'Personal information'
                 }, {
                     id: 3,
                     title: 'Background',
                     short: 'Diversity & schooling'
                 }, {
                     id: 4,
                     title: 'Education',
                     short: 'Qualifications & work'
                 }, {
                     id: 5,
                     title: 'Finish',
                     short: 'Review & submit'
                 }],
                 declarations: [{
                     text: 'I declare that I have read, understood and agree with the terms and conditions of enrolment.',
                     label: 'Terms & Conditions'
                 }, {
                     text: 'I have checked the specific course and entry requirements on the Courses Page for the course I want to study and I confirm that I am eligible. I agree that some courses have practical requirements that may require me to organise others to assist me.',
                     label: 'Course Eligibility'
                 }, {
                     text: "I'm committed to putting in the effort required to earn my qualification.",
                     label: 'Study Commitment'
                 }, {
                     text: 'I understand that Bard College courses may be delivered in part or entirely online and this requires considerable motivation and self-discipline. It also requires a basic level of digital literacy skills.',
                     label: 'Online Learning'
                 }],
                 indigenousOptions: ['No', 'Yes, Aboriginal', 'Yes, Torres Strait Islander',
                     'Yes, Aboriginal AND Torres Strait Islander'
                 ],
                 get progress() {
                     return Math.round((this.currentStep / this.totalSteps) * 100);
                 },
                 init() {
                     this.currentStep = 1;
                 },
                 nextStep() {
                     if (this.currentStep < this.totalSteps) {
                         this.currentStep++;
                         this.scrollToForm();
                     }
                 },
                 previousStep() {
                     if (this.currentStep > 1) {
                         this.currentStep--;
                         this.scrollToForm();
                     }
                 },
                 goToStep(step) {
                     if (step >= 1 && step <= this.totalSteps) {
                         this.currentStep = step;
                         this.scrollToForm();
                     }
                 },
                 scrollToForm() {
                     this.$nextTick(() => {
                         const form = document.getElementById('enrolmentForm');
                         if (!form) return;
                         const top = form.getBoundingClientRect().top + window.scrollY - 120;
                         window.scrollTo({
                             top: Math.max(0, top),
                             behavior: 'smooth'
                         });
                     });
                 },
                 submitApplication() {
                     /* * No validation as requested. * * Replace this section later with: * * this.$refs.form.submit() * * or AJAX / fetch / Laravel submission. */
                     this.submitted = true;
                 }
             };
         }
     </script>
 @endsection
