<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wait-List') }}
        </h2>
    </x-slot>

    <x-slot name="actionButton">
        <a href="{{ route('waitlist.create') }}">
            <x-button class="flex ">
                <i class="flex fi fi-rr-plus mr-2"></i>
                {{ __('Add to wait-list') }}
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
                                    {{ __('Name of visitor') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('purpose') }}
                                </th>

                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    {{ __('Actions') }}
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
                                            </span>
                                        </div>
                                    </td>


                                    <td class=" w-auto px-2 py-2">
                                        <a href="{{ route('waitlist.purpose') }}">
                                            <x-button class="flex ">
                                                <i class="flex fi fi-rr-plus mr-2"></i>
                                                {{ __('purpose') }}
                                            </x-button>
                                        </a>
                                    </td>

                                    <td class="w-auto h-full">

                                        <div class="flex items-center justify-center space-x-1">
                                            <a href=" {{ route('waitlist.edit', $visit->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>


                                            <form method="post" action="{{ route('waitlist.destroy', $visit->id) }}"
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
