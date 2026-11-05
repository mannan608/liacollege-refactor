@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Dashboard Overview</h1>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Welcome back! Here's a live pulse of your
                    institution today.</p>
            </div>
            <div class="flex items-center gap-3">
                {{-- <span class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ now()->format('l, F j, Y') }}
                </span> --}}
                <a href="{{ role_route('role.students.create') }}"
                    class="inline-flex items-center gap-2 rounded-lg bg-brand-600 px-4 py-2 text-xs font-semibold text-white shadow-sm transition-all hover:bg-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-600 focus:ring-offset-2">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Enroll Student
                </a>
            </div>
        </div>

        <!-- Summary Cards Grid -->
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Students -->
            <div
                class="relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Total
                            Students</p>
                        <p class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">2180</p>
                    </div>
                    <div class="rounded-xl bg-brand-50 p-3.5 dark:bg-brand-900/20">
                        <svg class="h-6 w-6 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-medium text-emerald-600 dark:text-emerald-400">
                    <span
                        class="inline-flex items-center rounded-md bg-emerald-50 px-2 py-0.5 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300">
                        <svg class="mr-1 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        +12%
                    </span>
                    <span class="ml-2 text-gray-500 dark:text-gray-400">vs. previous month</span>
                </div>
            </div>

            <!-- Total Courses -->
            <div
                class="relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Active
                            Courses</p>
                        <p class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">09</p>
                    </div>
                    <div class="rounded-xl bg-purple-50 p-3.5 dark:bg-purple-900/20">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                    <span class="font-semibold text-gray-900 dark:text-white">9 Programs </span> <span class="ml-1 text-gray-500 dark:text-gray-400"> running this semester</span>
                </div>
            </div>

            <!-- New Enrollments -->
            <div
                class="relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">New
                            Enrollments</p>
                        <p class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">281</p>
                    </div>
                    <div class="rounded-xl bg-emerald-50 p-3.5 dark:bg-emerald-900/20">
                        <svg class="h-6 w-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs text-emerald-600 dark:text-emerald-400">
                    <span class="font-medium">+8 new joins</span>
                    <span class="ml-1 text-gray-500 dark:text-gray-400">in the last 24h</span>
                </div>
            </div>

            <!-- Pending Grades -->
            <div
                class="relative overflow-hidden rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">Pending
                            Grades</p>
                        <p class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">52</p>
                    </div>
                    <div class="rounded-xl bg-amber-50 p-3.5 dark:bg-amber-900/20">
                        <svg class="h-6 w-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs text-amber-600 dark:text-amber-400">
                    <span class="font-medium">Requires instructor action</span>
                </div>
            </div>
        </div>

        <!-- Main Analytics & Insights Grid -->
        <div class="grid gap-6 lg:grid-cols-3">
            <!-- Enrollment Trends Chart Section -->
            <div
                class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 lg:col-span-2">
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 dark:border-gray-700">
                    <div>
                        <h2 class="text-base font-semibold text-gray-900 dark:text-white">Enrollment Analytics</h2>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Monthly student acquisition trajectory</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center text-xs text-gray-500 dark:text-gray-400">
                            <span class="h-2 w-2 rounded-full bg-brand-600 mr-1.5"></span> New Students
                        </span>
                    </div>
                </div>
                <div class="relative mt-4 h-72 w-full">
                    <canvas id="enrollmentChart"></canvas>
                </div>
            </div>


            <!-- Quick Actions & System Shortcuts -->
            <div class="space-y-6">
                <!-- Top Courses Progress Widget -->
                <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <h3 class="mb-4 text-sm font-semibold text-gray-900 dark:text-white">Top Enrolled Programs</h3>
                    <div class="space-y-4">
                        @forelse ($topCourses ?? $popularCourses = [
    (object) [
        'name' => 'BSB80120 - Graduate Diploma of Management (Learning)',
        'students_count' => 96,
    ],
    (object) [
        'name' => 'CHC33021 - Certificate III in Individual Support',
        'students_count' => 64,
    ],
    (object) [
        'name' => 'CHC52025 - Diploma of Community Services',
        'students_count' => 72,
    ],
]; as $course)
                            <div>
                                <div class="mb-1.5 flex items-center justify-between text-xs font-medium">
                                    <span class="truncate pr-2 text-gray-700 dark:text-gray-300">{{ $course->name }}</span>
                                    <span
                                        class="text-gray-900 font-bold dark:text-white">{{ $course->students_count }}</span>
                                </div>
                                <div class="h-2 w-full overflow-hidden rounded-full bg-gray-100 dark:bg-gray-700">
                                    <div class="h-2 rounded-full bg-brand-600 transition-all duration-500"
                                        style="width: {{ min(($course->students_count / 150) * 100, 100) }}%">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-xs text-gray-500 dark:text-gray-400">No course data available</p>
                        @endforelse
                    </div>
                </div>

                <!-- Quick Shortcuts -->
                <div
                    class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <h3 class="mb-3 text-sm font-semibold text-gray-900 dark:text-white">Quick Actions</h3>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ role_route('role.students.create') }}"
                            class="flex flex-col items-center justify-center rounded-xl border border-gray-100 bg-gray-50/50 p-3 text-center transition-all hover:bg-brand-50/50 hover:border-brand-200 dark:border-gray-700 dark:bg-gray-700/30 dark:hover:bg-brand-900/10">
                            <div
                                class="rounded-lg bg-brand-100 p-2 text-brand-600 dark:bg-brand-900/40 dark:text-brand-400 mb-2">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Add Student</span>
                        </a>
                        <a href="{{ role_route('role.users.create') }}"
                            class="flex flex-col items-center justify-center rounded-xl border border-gray-100 bg-gray-50/50 p-3 text-center transition-all hover:bg-purple-50/50 hover:border-purple-200 dark:border-gray-700 dark:bg-gray-700/30 dark:hover:bg-purple-900/10">
                            <div
                                class="rounded-lg bg-purple-100 p-2 text-purple-600 dark:bg-purple-900/40 dark:text-purple-400 mb-2">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-700 dark:text-gray-300">Add User</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secondary Section Grid: Recent Enrollments & Live Activity Feed -->
        <div class="grid gap-6 lg:grid-cols-3">
            <!-- Recent Enrolled Students Table -->
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4 dark:border-gray-700">
                        <div class="flex items-center gap-2">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <h2 class="text-base font-semibold text-gray-900 dark:text-white">Recent Enrollments</h2>
                        </div>
                        <a href="{{ role_route('role.students.index') }}"
                            class="text-xs font-semibold text-brand-600 hover:text-brand-500 dark:text-brand-400">
                            View All &rarr;
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead
                                class="bg-gray-50/75 text-xs uppercase tracking-wider text-gray-500 dark:bg-gray-700/50 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3 font-semibold">Student</th>
                                    <th class="px-6 py-3 font-semibold">Course Enrolled</th>
                                    <th class="px-6 py-3 font-semibold">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                               @php
    $sampleStudents = [
        [
            'name' => 'Thomas Reed',
            'email' => 'thomas.reed@gmail.com',
            'initials' => 'TR',
            'course' => 'BSB80120 Graduate Diploma of Management (Learning)',
            'time' => '20 minutes ago',
        ],
        [
            'name' => 'Isla Bennett',
            'email' => 'isla.bennett@outlook.com',
            'initials' => 'IB',
            'course' => 'CHC33021 Certificate III in Individual Support',
            'time' => '2 hours ago',
        ],
        [
            'name' => 'Alexander Brooks',
            'email' => 'alexander.brooks@yahoo.com',
            'initials' => 'AB',
            'course' => 'ICT60220 Advanced Diploma of Information Technology',
            'time' => 'Yesterday',
        ],
        [
            'name' => 'Ruby Foster',
            'email' => 'ruby.foster@hotmail.com',
            'initials' => 'RF',
            'course' => 'SHB50216 Diploma of Salon Management',
            'time' => '2 days ago',
        ],
    ];
@endphp
                                @foreach ($sampleStudents as $student)
                                    <tr class="transition-colors hover:bg-gray-50/50 dark:hover:bg-gray-700/50">
                                        <td class="px-6 py-3.5">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-brand-100 text-xs font-bold text-brand-700 dark:bg-brand-900/30 dark:text-brand-300">
                                                    {{ $student['initials'] }}
                                                </div>
                                                <div>
                                                    <span
                                                        class="block font-semibold text-gray-900 dark:text-white">{{ $student['name'] }}</span>
                                                    <span
                                                        class="block text-xs text-gray-500 dark:text-gray-400">{{ $student['email'] }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3.5">
                                            <span
                                                class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-700 dark:bg-gray-700 dark:text-gray-300 max-w-[240px] truncate">
                                                {{ $student['course'] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-3.5 text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                            {{ $student['time'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Activity Stream / Timeline Card -->
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100 dark:border-gray-700">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Activity Timeline</h3>
                    <span class="text-xs text-gray-400">Live feed</span>
                </div>
                <div
                    class="relative pl-6 space-y-6 before:absolute before:bottom-2 before:top-2 before:left-2.5 before:w-0.5 before:bg-gray-200 dark:before:bg-gray-700">
                    <!-- Feed Item 1 -->
                    <div class="relative">
                        <span
                            class="absolute -left-6 mt-1 flex h-4 w-4 items-center justify-center rounded-full bg-brand-600 ring-4 ring-white dark:ring-gray-800"></span>
                        <div>
                            <p class="text-xs font-semibold text-gray-900 dark:text-white">Assignment Submitted</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Lucas Brown uploaded Project
                                Milestone 2</p>
                            <span class="mt-1 inline-block text-[10px] text-gray-400">10 mins ago</span>
                        </div>
                    </div>
                    <!-- Feed Item 2 -->
                    <div class="relative">
                        <span
                            class="absolute -left-6 mt-1 flex h-4 w-4 items-center justify-center rounded-full bg-emerald-600 ring-4 ring-white dark:ring-gray-800"></span>
                        <div>
                            <p class="text-xs font-semibold text-gray-900 dark:text-white">New Enrollment</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Sophia Clark registered for Kitchen
                                Management</p>
                            <span class="mt-1 inline-block text-[10px] text-gray-400">1 hour ago</span>
                        </div>
                    </div>
                    <!-- Feed Item 3 -->
                    <div class="relative">
                        <span
                            class="absolute -left-6 mt-1 flex h-4 w-4 items-center justify-center rounded-full bg-purple-600 ring-4 ring-white dark:ring-gray-800"></span>
                        <div>
                            <p class="text-xs font-semibold text-gray-900 dark:text-white">Course Updated</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">Instructor added 3 new modules to
                                Automotive Tech</p>
                            <span class="mt-1 inline-block text-[10px] text-gray-400">3 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script Integration -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('enrollmentChart');

        if (!canvas) return;

        const ctx = canvas.getContext('2d');

        // Gradient fill for chart
        const gradient = ctx.createLinearGradient(0, 0, 0, 250);
        gradient.addColorStop(0, 'rgba(37, 99, 235, 0.25)');
        gradient.addColorStop(1, 'rgba(37, 99, 235, 0.0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
                datasets: [{
                    label: 'Enrollments',
                    data: [28, 46, 39, 61, 54, 78, 69, 92, 84, 116, 101, 132],
                    borderColor: '#2563eb',
                    backgroundColor: gradient,
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.35,
                    pointBackgroundColor: '#2563eb',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleColor: '#f9fafb',
                        bodyColor: '#f9fafb',
                        padding: 10,
                        cornerRadius: 6,
                        displayColors: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 11
                            },
                            color: '#9ca3af'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(156, 163, 175, 0.1)'
                        },
                        ticks: {
                            font: {
                                size: 11
                            },
                            color: '#9ca3af',
                            stepSize: 20
                        },
                        border: {
                            dash: [4, 4]
                        }
                    }
                }
            }
        });
    });
</script>
    @endpush
@endsection
