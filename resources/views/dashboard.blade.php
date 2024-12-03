<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('main-page.create')}}">new offer</a>
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
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{$item->img}}" alt="{{$item->img}}">
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$item->text}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="text-blue-400" href="{{$item->url}}">{{$item->url}}</a>
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
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{$item->img}}" alt="{{$item->img}}">
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$item->title}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="text-blue-400" href="{{$item->url}}">{{$item->url}}</a>
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
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{$item->logo}}" alt="{{$item->logo}}">
                                        </th>
                                        <td class="px-6 py-4 overflow-hidden truncate hover:max-h-screen hover:overflow-visible hover:whitespace-normal transition-all duration-300 ease-in-out">
                                            {{$item->year}} <br>
                                            {{$item->brief}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class="text-blue-400" href="{{$item->url}}">{{$item->url}}</a>
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
                                            <img src="{{$item->img}}" alt="{{$item->img}}">
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
