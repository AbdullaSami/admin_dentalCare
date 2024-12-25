<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Register New Doctor') }}
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

                    <form action="{{route('registered-doctors.store')}}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg space-y-4">
                        @csrf

                        <!-- Name Input -->
                        <div>
                          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                          <input
                            type="text"
                            name="name"
                            id="name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your Name"
                            >
                        </div>

                        <!-- Email Input -->
                        <div>
                          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                          <input
                            type="text"
                            name="email"
                            id="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter Email"
                            >
                        </div>

                        <!-- Phone Number -->
                        <div>
                          <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                          <input
                          type="text"
                            name="phone_number"
                            id="phone_number"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
                        </div>

                        <!-- WhatsApp Number -->
                        <div>
                          <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">WhatsApp Number</label>
                          <input
                            type="text"
                            name="whatsapp_number"
                            id="whatsapp_number"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            >
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
