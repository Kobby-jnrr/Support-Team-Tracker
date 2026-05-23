<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Activity Report
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Filter -->
            <form method="GET" action="/activities/report" class="mb-6 flex items-end gap-4">

                <div>
                    <label class="block text-sm text-gray-600 mb-1">FROM</label>
                    <input type="date"
                        name="from"
                        value="{{ request('from') }}"
                        class="border-gray-300 rounded-md">
                </div>

                <div>
                    <label class="block text-sm text-gray-600 mb-1">TO</label>
                    <input type="date"
                        name="to"
                        value="{{ request('to') }}"
                        class="border-gray-300 rounded-md">
                </div>

                <div>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                        Filter
                    </button>
                </div>

            </form>

            <!-- Results -->
            <div class="space-y-4">

                @forelse($updates as $update)

                    <div class="bg-white p-4 rounded shadow-sm">

                        <p><strong>Activity:</strong> {{ $update->activity->title }}</p>

                        <p><strong>Status:</strong> {{ strtoupper($update->status) }}</p>

                        <p><strong>Remark:</strong> {{ $update->remark }}</p>

                        <p><strong>Updated By:</strong> {{ $update->user?->name }}</p>

                        <p class="text-sm text-gray-500">
                            {{ $update->created_at->format('Y-m-d H:i') }}
                        </p>

                    </div>

                @empty
                    <p class="text-gray-500">No records found.</p>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>