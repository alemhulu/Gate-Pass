<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('visitors List') }}
        </h2>
    </x-slot>

    <x-slot name="actionButton">
        <a href="{{ route('visits.create') }}">
            <x-button class="flex ">
                <i class="flex fi fi-rr-plus mr-2"></i>
                {{ __('Create Visit') }}
            </x-button>
        </a>
    </x-slot>
    <div>
        <!-- Search button -->
        <div>
            <form action="/search" method="get">
                <div class="form-group">
                    <input type="search" name="search" class="input-group">
                    <span class="input-group-prepend">

                        <button type="submit" class="btn btn-primary">search

                        </button>
                    </span>
                </div>


            </form>



        </div>


    </div>
    <div>
        <div class="w-full mx-auto py-10 ">
            <div class="overflow-x-auto">
                <div class="w-full overflow-auto align-middle border-gray-200 shadow sm:rounded-lg">
                    <table class="w-full divide-y divide-slate-200">
                        <thead>
                            <tr class="divide-x divide-slate-200">
                                <th
                                    class=" px-2 py-3 text-xs font-medium leading-4 tracking-wider text-left
                                text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Requestor name and department') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Access Codes') }}

                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('QR Codes') }}

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
                                    {{ __('Email') }}
                                </th>


                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('plates') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Actions') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('checking') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Approve') }}
                                </th>

                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-slate-200">
                            <?php $i = 1; ?>
                            @foreach ($visits as $visit)
                                <tr class="divide-x divide-slate-200">
                                    <td class="w-56">
                                        <div class="px-2 py-2  flex-col items-center space-y-1">
                                            <span class="flex text-gray-600 font-semibold items-center">
                                                <span class="fi fi-rr-comment-user flex mr-1 gap-x-1"> </span>
                                                {{ $visit->user->name }}
                                            </span>
                                            <span class="flex text-gray-500  items-center">
                                                <span class="fi fi-rr-building flex mr-1 text-sm gap-x-1">
                                                    {{ $visit->user->department ?? ' Department' }}
                                                </span>
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-2 py-2 text-center">
                                        <span class="font-semibold text-gray-600 ">{{ $visit->code }}</span>
                                    </td>

                                    <td class="w-auto p-1 flex justify-center">
                                        <img src="{{ $visit->qr_image }}" class="w-24">
                                    </td>

                                    <td class="w-auto px-2 py-2 flex-col text-gray-500 font-semibold space-y-2">
                                        @if (LaravelLocalization::getCurrentLocale() === 'en')
                                            <span
                                                class="flex">{{ date('F d, Y', strtotime($visit->request_date)) }}</span>
                                        @else
                                            <span class="flex">
                                                @php
                                                    $date = DateTime::createFromFormat('Y-m-d', $visit->request_date);
                                                    $ethipic = new Andegna\DateTime($date);
                                                    echo $ethipic->format('F d, Y', Andegna\Constants::DATE_ETHIOPIAN);
                                                @endphp
                                            </span>
                                        @endif
                                    </td>

                                    <td class="w-auto px-2 py-2 flex-col text-gray-500 font-semibold space-y-2">
                                        @if (LaravelLocalization::getCurrentLocale() === 'en')
                                            <span
                                                class="flex">{{ date('F d, Y', strtotime($visit->visit_date)) }}</span>
                                        @else
                                            <span class="flex">
                                                @php
                                                    $date = DateTime::createFromFormat('Y-m-d', $visit->visit_date);
                                                    $ethipic = new Andegna\DateTime($date);
                                                    echo $ethipic->format('F d, Y', Andegna\Constants::DATE_ETHIOPIAN);
                                                @endphp
                                            </span>
                                        @endif
                                    </td>

                                    <td class=" w-auto px-2 py-2">
                                        <p>{{ $visit->visitor_list }}
                                        </p>
                                    </td>

                                    <td class=" w-auto px-2 py-2">
                                        <p>{{ $visit->email }}
                                        </p>
                                    </td>


                                    <td class=" w-auto px-2 py-2">
                                        <span>{{ $visit->plates ?? ' null' }}</span>
                                    </td>

                                    <td class="w-auto h-full">

                                        <div class="flex items-center justify-center space-x-1">
                                            <a href=" {{ route('visits.edit', $visit->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>


                                            <form method="post" action="{{ route('visits.destroy', $visit->id) }}"
                                                class="flex">
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


                                    <td class="px-2 py-2w-full">
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class=" w-1/3">
                                                <form method="post"
                                                    action="{{ route('check-in-out.update', $visit->id) }}"
                                                    class="flex">
                                                    @csrf @method('PUT')
                                                    <x-toggle publish="{{ $visit->status }}" />

                                                </form>
                                            </div>

                                    </td>

                                    <td class="px-2 py-2w-full">
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class=" w-1/3">
                                                <form method="post" action="{{ route('Approve.update', $visit->id) }}"
                                                    class="flex">
                                                    @csrf @method('PUT')
                                                    <x-toggle2 publish="{{ $visit->Approved }}" />

                                                </form>
                                            </div>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function ShowHideDiv(chkHasCar) {
            var dvHasCar = document.getElementById("dvHasCar");
            dvHasCar.style.display = chkHasCar.checked ? "block" : "none";
        }
    </script>
</x-admin-layout>
