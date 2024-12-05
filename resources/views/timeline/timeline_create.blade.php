<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{route('timeline.store')}}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg space-y-4">
                        @csrf

                        <!-- Year Input -->
                        <div>
                          <label for="year" class="block text-sm font-medium text-gray-700">Start Year</label>
                          <input
                            type="text"
                            name="year"
                            id="year"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter the start working year">
                        </div>

                        <!-- brief Input -->
                        <div>
                          <label for="brief" class="block text-sm font-medium text-gray-700">Brief</label>
                          <input
                            type="text"
                            name="brief"
                            id="brief"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter company brief">
                        </div>

                        <!-- URL Input -->
                        <div>
                          <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                          <input
                            type="text"
                            name="url"
                            id="url"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter company website url">
                        </div>

                        <!-- Logo Upload -->
                        <div>
                          <label for="logo" class="block text-sm font-medium text-gray-700">Upload Company Logo</label>
                          <input
                            type="file"
                            name="logo"
                            id="logo"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border file:border-gray-300 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                        </div>

                        <!-- Submit Button -->
                        <button
                          type="submit"
                          class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                          Submit
                        </button>
                      </form>

</div>
</div>
</div>
</div>
</x-app-layout>
