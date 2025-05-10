<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div class="py-10 ">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-8 text-3xl font-bold text-gray-800 dark:text-white">الإحصائيات الرئيسية</h1>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <!-- Total Surahs -->
                <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">عدد السور</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">114</p>
                    </div>
                    <div class="text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>

                <!-- Total Verses -->
                <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">عدد الآيات</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">6,236</p>
                    </div>
                    <div class="text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Total Words -->
                <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">عدد الكلمات</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">105,234</p>
                    </div>
                    <div class="text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                </div>

                <!-- Total Roots -->
                <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">عدد الجذور</p>
                        <p class="mt-1 text-2xl font-semibold text-gray-900 dark:text-white">2,400</p>
                    </div>
                    <div class="text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>