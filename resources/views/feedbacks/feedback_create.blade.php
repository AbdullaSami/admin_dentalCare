<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Feedback') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('error'))
        <p>
            {{ session('error') }}
        </p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{route('feedback.store')}}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg space-y-4">
                        @csrf

                        <!-- Name Input -->
                        <div>
                          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                          <input
                            type="text"
                            name="name"
                            id="name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your Name">
                        </div>

                        <!-- COMMENT Input -->
                        <div>
                          <label for="comment" class="block text-sm font-medium text-gray-700">Comment: </label>
                          <input
                            type="text"
                            name="comment"
                            id="comment"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your comment">
                        </div>

                        <!-- RATE Input -->
                        <div>
                          <label for="rate" class="block text-sm font-medium text-gray-700">Rate </label>
                          <input
                            type="text"
                            name="rate"
                            id="rate"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Rate our services and products ">
                        </div>

                        <!-- Image Upload -->
                        <div>
                          <label for="img" class="block text-sm font-medium text-gray-700">Upload Image</label>
                          <input
                          required
                            type="file"
                            name="img"
                            id="img"
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
