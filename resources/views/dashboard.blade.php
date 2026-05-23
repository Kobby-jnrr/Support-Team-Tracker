<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Support Team Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <!-- Total Activities -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">Total Activities</p>
                    <h3 class="text-3xl font-bold text-gray-900">
                        {{ $totalActivities }}
                    </h3>
                </div>

                <!-- Total Updates -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-500 text-sm">Total Updates</p>
                    <h3 class="text-3xl font-bold text-gray-900">
                        {{ $totalUpdates }}
                    </h3>
                </div>

                <!-- Completed -->
                <div class="bg-green-50 p-6 rounded-lg shadow">
                    <p class="text-green-600 text-sm">Completed Updates</p>
                    <h3 class="text-3xl font-bold text-green-700">
                        {{ $doneUpdates }}
                    </h3>
                </div>

                <!-- Pending -->
                <div class="bg-yellow-50 p-6 rounded-lg shadow">
                    <p class="text-yellow-600 text-sm">Pending Updates</p>
                    <h3 class="text-3xl font-bold text-yellow-700">
                        {{ $pendingUpdates }}
                    </h3>
                </div>

            </div>

            <div class="mt-6 text-gray-600 text-sm">
                Welcome to the Support Team Tracker System.
            </div>

        </div>
    </div>
</x-app-layout>