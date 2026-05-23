<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Activity
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <h3 class="text-lg font-bold text-gray-900 mb-4">
                    {{ $activity->title }}
                </h3>

                <form method="POST" action="/activities/{{ $activity->id }}/update" class="space-y-4">
                    @csrf

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Status
                        </label>

                        <select name="status"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="done">Done</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>

                    <!-- Remark -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Remark
                        </label>

                        <textarea name="remark"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>

                    <!-- Button -->
                    <div>
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Save Update
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>