<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Create new buttons --}}
        <div class="m-4 flex flex-col md:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a class="h-10 w-full sm:w-auto flex items-center justify-center bg-blue-400 hover:bg-blue-500 text-blue-100 hover:text-white transition px-4 py-2 rounded-xl" href="{{route('main-page.create')}}">
            new offer
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor" class="ml-2 w-4 h-4">
                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
            </svg>
            </a>
            <a class="h-10 w-full sm:w-auto flex items-center justify-center bg-blue-400 hover:bg-blue-500 text-blue-100 hover:text-white transition px-4 py-2 rounded-xl" href="{{route('event.create')}}">
            new event
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor" class="ml-2 w-4 h-4">
                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
            </svg>
            </a>
            <a class="h-10 w-full sm:w-auto flex items-center justify-center bg-blue-400 hover:bg-blue-500 text-blue-100 hover:text-white transition px-4 py-2 rounded-xl" href="{{route('timeline.create')}}">
            new Card
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor" class="ml-2 w-4 h-4">
                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
            </svg>
            </a>
            <a class="h-10 w-full sm:w-auto flex items-center justify-center bg-blue-400 hover:bg-blue-500 text-blue-100 hover:text-white transition px-4 py-2 rounded-xl" href="{{route('feedback.create')}}">
            new Feedback
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor" class="ml-2 w-4 h-4">
                <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
            </svg>
            </a>
        </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Offers Table --}}
                    <div class="relative overflow-x-auto">
                        <h2 class="text-center m-2 font-bold">OFFERS</h2>
                        <table class="table-fixed w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class=" uppercase">
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        text
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        url
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mainPage as $item )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-0 md:px-6  py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img  class="h-20" src="{{$item->img}}" alt="{{$item->img}}">
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$item->text}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="text-blue-400" href="{{$item->url}}">Test Link</a>
                                        </td>
                                        <td class="px-4 py-2 space-x-2 flex justify-start">
                                            <a  class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-sm" href="{{ route('main-page.edit', $item->id) }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('main-page.destroy', $item->id) }}" method="POST">
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

                    {{-- Events Table --}}
                    <div class="relative overflow-x-auto mt-4">
                        <h2 class="text-center m-2 font-bold">EVENTS</h2>
                        <table class="table-fixed w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class=" uppercase">
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        text
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        url
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $item )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-0 md:px-6  py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="h-20" src="{{$item->img}}" alt="{{$item->img}}">
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$item->title}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="text-blue-400" href="{{$item->url}}" target="_blank">{{$item->url}}</a>
                                        </td>
                                        <td class="px-4 py-2 space-x-2 flex justify-start">
                                            <a  class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-sm" href="{{ route('event.edit', $item->id) }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('event.destroy', $item->id) }}" method="POST">
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

                    {{-- Timeline Table --}}
                    <div class="relative overflow-x-auto mt-4">
                        <h2 class="text-center m-2 font-bold">TIMELINE</h2>
                        <table class="table-fixed w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class=" uppercase">
                                    <th scope="col" class="px-6 py-3">
                                        Image
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        text
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        url
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timeline as $item )
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-0 md:px-6  py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="h-20" src="{{$item->logo}}" alt="{{$item->logo}}">
                                        </th>
                                        <td class="px-6 py-4 overflow-hidden truncate hover:max-h-screen hover:overflow-visible hover:whitespace-normal transition-all duration-300 ease-in-out">
                                            {{$item->year}} <br>
                                            {{$item->brief}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="text-blue-400" href="{{$item->url}}">{{$item->url}}</a>
                                        </td>
                                        <td class="px-4 py-2 space-x-2 flex justify-start">
                                            <a  class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-sm" href="{{ route('timeline.edit', $item->id) }}">
                                                Edit
                                            </a>
                                            <form action="{{ route('timeline.destroy', $item->id) }}" method="POST">
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
                                        <th scope="row" class="px-0 md:px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                                @method('Put')
                                                <input type="hidden" name="is_published" id="is_published" value="0">
                                                <button type="submit" class="bg-red-400 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm">Unpublish</button>
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
    function toggleAccordion(id) {
        const element = document.getElementById(`accordion-${id}`);
        element.classList.toggle("hidden");
    }
</script>
