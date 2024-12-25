<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Doctors Feedbacks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-2 text-center">
                <button id="copyButton" class="flex justify-center items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Copy feedback link
                    <svg fill="currentColor" class="ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M384 336l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L400 115.9 400 320c0 8.8-7.2 16-16 16zM192 384l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1L192 0c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-32-48 0 0 32c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l32 0 0-48-32 0z"/></svg>
                </button>
            </div>
            <div class="py-2 bg-gray-300 border-b border-gray-200">
                <form method="GET" action="{{ route('feedback.index') }}" class="max-w-md mx-auto">
                    @csrf
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input value="{{ request('search') }}" type="text" id="search" name="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search with Doctor Name..." />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Feedback Table --}}
                    <div class="relative overflow-x-auto mt-4">
                        <h2 class="text-center m-2 font-bold">FEEDBACK</h2>
                        <table class="table-fixed w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class=" uppercase">
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        comment
                                    </th>
                                    <th scope="col" class="px-2 py-3">
                                        rate
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $item )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-0 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="h-20" src="{{$item->img}}" alt="{{$item->img}}">
                                        </th>
                                        <th class="px-6 py-4">
                                            {{$item->name}}
                                        </th>
                                        <td class="px-6 py-4 overflow-hidden truncate hover:max-h-screen hover:overflow-visible hover:whitespace-normal transition-all duration-300 ease-in-out">
                                            {{$item->comment}}
                                        </td>
                                        <td class="px-2 py-4">
                                            {{$item->rate}}/5
                                        </td>
                                        <td class="px-4 py-2 space-x-2 flex justify-start">
                                            <a  class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-sm" href="{{ route('feedback.edit', $item->id) }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('feedback.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="is_published" id="is_published"  value="{{$item->is_published ? 0 : 1}}">
                                                <button type="submit" class="{{$item->is_published ? 'bg-red-400 hover:bg-red-500' : 'bg-green-400 hover:bg-green-500'}}  text-white px-3 py-1 rounded-md text-sm">{{$item->is_published ? 'Unpublish' : 'Publish'}}</button>
                                            </form>
                                            <form action="{{ route('feedback.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm">Cancel</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('copyButton').addEventListener('click', function() {
        const textToCopy = 'https://admin.dentalcarecorp.com/feedback-new';
        navigator.clipboard.writeText(textToCopy).then(function() {
            const copyButton = document.getElementById('copyButton');
            copyButton.innerText = 'Link Copied';
            setTimeout(() => {
                copyButton.innerText = 'Copy feedback link';
            }, 1000);
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    });
</script>
