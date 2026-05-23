<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Create Activity
        </h1>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="/activities" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Title
                </label>

                <input type="text"
                       name="title"
                       class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Enter activity title">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Description
                </label>

                <textarea name="description"
                          rows="4"
                          class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                          placeholder="Enter activity description"></textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Save Activity
                </button>
            </div>

        </form>

    </div>
</x-app-layout>