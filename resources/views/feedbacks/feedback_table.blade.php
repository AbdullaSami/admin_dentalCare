<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Doctors Feedbacks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                    <th scope="col" class="px-6 py-3">
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
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="h-20" src="{{$item->img}}" alt="{{$item->img}}">
                                        </th>
                                        <th class="px-6 py-4">
                                            {{$item->name}}
                                        </th>
                                        <td class="px-6 py-4 overflow-hidden truncate hover:max-h-screen hover:overflow-visible hover:whitespace-normal transition-all duration-300 ease-in-out">
                                            {{$item->comment}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$item->rate}}/5
                                        </td>
                                        <td class="px-4 py-2 space-x-2 flex justify-start">
                                            <a  class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-sm" href="{{ route('feedback.edit', $item->id) }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('feedback.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="is_published" id="is_published" value="1">
                                                <button type="submit" class="bg-green-400 hover:bg-green-500 text-white px-3 py-1 rounded-md text-sm">Publish</button>
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

