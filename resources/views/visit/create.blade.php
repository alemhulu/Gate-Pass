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

    <!-- Create visitors -->
    <x-slot name="actionButton">
        <a href="{{ route('visits.index') }}">
            <x-button class="flex ">
                <i class="flex fi-rr-arrow-left mr-2"></i>
                {{ __('Back') }}
            </x-button>
        </a>
    </x-slot>

    <x-form-card action="{{ route('visits.store') }}" title="Create New Visit">
        <x-slot name="body">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                <x-label for="name" value="{{ __('Visit Date') }}" />
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="flex space-x-2">
                        <x-select id="month" name="month">
                            @foreach ($months as $key => $month)
                            <option value={{ $key + 1 }} @if ($month===$ethipic->getTextualMonth()) selected @endif>
                                {{ __($month) }}
                            </option>
                            @endforeach
                        </x-select>

                        <x-select id="day" name="day">
                            @for ($i = 1; $i <= 30; $i++) <option value={{ $i }} @if ($i===$ethipic->getDay()) selected
                                @endif>
                                {{ $i }}</option>
                                @endfor
                        </x-select>

                        <x-select id="year" name="year">
                            @for ($i = 2014; $i <= 2024; $i++) <option value={{ $i }} @if ($i===$ethipic->
                                getYear())
                                selected
                                @endif>
                                {{ $i }}</option>
                                @endfor
                        </x-select>
                    </div>
                    <x-input-error for="name" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                <x-label for="visitors" value="{{ __('Visitor Full Name') }}" />
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <x-input type="text" name="visitors" id="visitors" />
                    <x-input-error for="visitors" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                <x-label for="contact_number" value="{{ __('Contact Number') }}" />
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <x-input type="text" name="contact_number" id="contact_number" />
                    <x-input-error for="contact_number" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                <x-multi-checkbox name="has_car" value="1" title="{{ __('Check If Visitor Has Car') }}"
                    onclick="ShowHideDiv(this)" />
            </div>
            <div id="dvHasCar" class="hidden">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                    <x-label for="has_car" value="{{ __('Visitor Plate Numbers') }}" />
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <x-input type="text" name="plates" value="{{ old('plates') }}" placeholder="AA B12345" />
                        <x-input-error for="has_car" />
                    </div>
                </div>
            </div>

        </x-slot>
    </x-form-card>
    <script type="text/javascript">
        function ShowHideDiv(chkHasCar) {
            var dvHasCar = document.getElementById("dvHasCar");
            dvHasCar.style.display = chkHasCar.checked ? "block" : "none";
        }
    </script>
</x-admin-layout>