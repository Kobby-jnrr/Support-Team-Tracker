<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Today’s Activity Log
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <h3 class="text-lg font-bold mb-4 text-gray-900">
                    Updates for Today
                </h3>

                <div class="space-y-4">

                    @forelse($updates as $update)

                        <div class="border rounded-lg p-4 bg-gray-50">

                            <p class="text-sm text-gray-700">
                                <span class="font-semibold">Activity:</span>
                                {{ $update->activity->title }}
                            </p>

                            <p class="text-sm text-gray-700">
                                <span class="font-semibold">Status:</span>
                                {{ strtoupper($update->status) }}
                            </p>

                            <p class="text-sm text-gray-700">
                                <span class="font-semibold">Remark:</span>
                                {{ $update->remark }}
                            </p>

                            <p class="text-sm text-gray-700">
                                <span class="font-semibold">Updated By:</span>
                                {{ $update->user?->name }}
                            </p>

                            <p class="text-xs text-gray-500 mt-1">
                                {{ $update->created_at->format('H:i:s') }}
                            </p>

                        </div>

                    @empty
                        <p class="text-gray-500">
                            No updates recorded today.
                        </p>
                    @endforelse

                </div>

            </div>

        </div>
    </div>
</x-app-layout>