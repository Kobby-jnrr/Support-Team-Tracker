<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Activities
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header Actions -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">
                    All Activities
                </h1>

                <a href="/activities/create"
                   class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    + Create Activity
                </a>
            </div>

            <!-- Activities List -->
            <div class="space-y-6">

                @forelse($activities as $activity)
                    <div class="bg-white shadow-sm rounded-lg p-6">

                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-semibold text-gray-900">
                                {{ $activity->title }}
                            </h3>

                            <!-- Activity Status -->
                            @if($activity->status == 'active')
                                <span class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">
                                    ACTIVE
                                </span>
                            @elseif($activity->status == 'completed')
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                    COMPLETED
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs bg-gray-200 text-gray-700 rounded">
                                    ARCHIVED
                                </span>
                            @endif
                        </div>

                        <p class="text-gray-600 mt-1">
                            {{ $activity->description }}
                        </p>

                        <a href="/activities/{{ $activity->id }}/update"
                           class="inline-block mt-3 px-3 py-1 text-sm bg-gray-800 text-white rounded hover:bg-gray-900">
                            Update Activity
                        </a>

                        <!-- Updates -->
                        <div class="mt-5">
                            <h4 class="font-semibold text-gray-800 mb-2">
                                Updates
                            </h4>

                            @forelse($activity->updates ?? [] as $update)

                                <div class="border rounded-md p-4 mb-3 bg-gray-50">

                                    <div class="mb-2">
                                        <span class="font-medium">Status:</span>

                                        @if($update->status == 'done')
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                                DONE
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded">
                                                PENDING
                                            </span>
                                        @endif
                                    </div>

                                    <p class="text-sm text-gray-700">
                                        <span class="font-medium">Remark:</span>
                                        {{ $update->remark }}
                                    </p>

                                    <p class="text-sm text-gray-700">
                                        <span class="font-medium">Updated By:</span>
                                        {{ optional($update->user)->name }}
                                    </p>

                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ optional($update->created_at)->diffForHumans() }}
                                    </p>

                                </div>

                            @empty
                                <p class="text-gray-500 text-sm">
                                    No updates yet.
                                </p>
                            @endforelse

                        </div>

                    </div>
                @empty
                    <p class="text-gray-500">
                        No activities found.
                    </p>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>