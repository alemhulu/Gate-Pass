<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('visitors List') }}
        </h2>
    </x-slot>


    <div>
        @if (session('success'))
            <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium">Success alert!</span> {{ session('success') }}
                </div>
            </div>
        @endif



        <div class="flex justify-end">
            <button class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600"><a
                    href="{{ route('visit.create') }}">Create Visit</a> </button>
        </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="w-full overflow-auto align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('#') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Requestor name and department') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Request date') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('entry date') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Visitors') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('contact_number') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Vehicles') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Access Codes') }}

                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('plates') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('edit/delete ') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('checking') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <?php $i = 1; ?>
                            @foreach ($visits as $visit)
                                <tr>
                                    <td class="px-6 py-4  border border-gray-200">
                                        <div class="flex items-center">
                                            {{ $i++ }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4  border border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">{{ $visit->requestor_id }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4  border border-gray-200">
                                        <p>{{ $visit->request_date }}
                                        </p>
                                    </td>

                                    <td class="px-6 py-4  border border-gray-200">
                                        <span>{{ $visit->visit_date }}</span>
                                    </td>

                                    <td class="px-6 py-4  border border-gray-200">
                                        <p>{{ $visit->visitor_list }}
                                        </p>
                                    </td>

                                    <td class="px-6 py-4  border border-gray-200">
                                        <p>{{ $visit->contact_number }}
                                        </p>
                                    </td>

                                    <td class="px-6 py-4  border border-gray-200">
                                        <ul style="list-style-type: circle; ">
                                            @if ($visit->has_car == 0)
                                                <p style=>
                                                    የለም
                                                </p>
                                            @else
                                                @foreach (explode('#', $visit->plates) as $key => $plate)
                                                    @if ($key > 0)
                                                        <li>{{ $plates }}</li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>

                                    <td class="px-6 py-4  border border-gray-200">
                                        <span>{{ $visit->code }}</span>
                                    </td>

                                    <td class="px-6 py-4  border border-gray-200">
                                        <span>{{ $visit->plates }}</span>
                                    </td>

                                    <td class="border border-gray-200 h-full">

                                        <div  class="flex items-center justify-center space-x-1">
                                            <a href=" {{ route('visit.edit', $visit->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>


                                            <form method="post" action="{{ route('visit.destroy', $visit->id) }}" class="flex">
                                                @csrf @method('delete')
                                                <button type="submit">
                                                    <svg class="w-6 h-6 text-red-600 hover:text-red-800" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

                                    </td>

                                    <td class="px-6 py-4 w-full border border-gray-200">
                                        <span>{{ $visit->status }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
