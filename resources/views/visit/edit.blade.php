<x-admin-layout>

    <?php
    $datetime = new DateTime();
    $current_date = date('Y-m-d');
    
    $date = $datetime->createFromFormat('Y-m-d', $current_date);
    
    $ethipic = Andegna\DateTimeFactory::fromDateTime($date);
    //   echo $ethipic->format(Andegna\Constants::DATE_ETHIOPIAN);
    ?>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add visitors') }}
        </h2>
    </x-slot>

    <div class="flex justify-end">
        <button type="button"
            class="px-6 py-2 text-sm font-semibold align:right text-gray-100 bg-red-700 rounded-md shadow-md hover:bg-red-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
            <a href="{{ route('visit.index') }}">Back</a>
        </button>
    </div>

    @if($errors->any())

    <div>
        <div class="font-medium text-red-600">
            {{ __('whoops!something went wrong.') }}
        </div>

        <ul class="mt-3 list-disk list-inside text-sm text-red-600">
            @foreach ($errors as $error )
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Create visitors -->
    <form method="post" action="{{ route('visit.update', $visit->id) }}">
        @csrf
        @method('put')

        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('visit date') }}:</label>
        <div>
            <div class="mt-2 ">
                <select id="month" name="month">
                    @foreach ($months as $key => $month)
                    <option value={{ $key + 1 }} @if ($month===$ethipic->getTextualMonth()) selected @endif>
                        {{ $month }}
                    </option>
                    @endforeach
                </select>

                <select id="day" name="day">
                    @for ($i = 1; $i <= 30; $i++) <option value={{ $i }} @if ($i===$ethipic->getDay()) selected @endif>
                        {{ $i }}</option>
                        @endfor
                </select>

                <select id="year" name="year">
                    @for ($i = 2014; $i <= 2024; $i++) <option value={{ $i }} @if ($i===$ethipic->getYear()) selected
                        @endif>
                        {{ $i }}</option>
                        @endfor
                </select>
            </div>
        </div>


        <div class="mt-4">
            <label for="visitors" class="col-md-4 col-form-label text-md-right">{{ __('visitors_full_name') }}:</label>
            <div>
                <input
                    class="pl-3 block mt-2 h-10 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="name" name="visitors" value="{{ $visit->visitor_list }}" />
            </div>
        </div>

        <div class="mt-4">
            <label for="visitors" class="col-md-4 col-form-label text-md-right">{{ __('contact_number') }}:</label>
            <div>
                <input
                    class="pl-3 block w-70% mt-2 h-10 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="number" name="contact_number" value="{{ $visit->contact_number }}" />
            </div>
        </div>

        <div class="block">
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="chkPassport" name="has_car" value="{{ $visit->has_car }}"
                        onclick="ShowHideDiv(this)" {{ $visit->has_car === 1 ? 'checked="checked"' : '' }} />
                    <span class="ml-2">has car</span>
                </label>
            </div>
        </div>

        <div id="dvPassport" class="{{ $visit->has_car === 1 ? 'block' : 'hidden' }}">
            <label class="block text-sm font-bold text-gray-700" for="plates">
                {{ __('Car-plate') }}
            </label>

            <input
                class="block w-1000 mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-left focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" name="plates" placeholder="{{ __('Enter car-plate') }}" value="{{ $visit->plates }}" />
        </div>

        <div class="flex items-center justify-start mt-4 gap-x-2">
            <button type="submit"
                class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                update
            </button>
        </div>
    </form>
    <script type="text/javascript">
        function ShowHideDiv(chkPassport) {
            var dvPassport = document.getElementById("dvPassport");
            dvPassport.style.display = chkPassport.checked ? "block" : "none";
        }
    </script>
</x-admin-layout>