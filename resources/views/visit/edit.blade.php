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

    <x-slot name="actionButton">
        <a href="{{ route('visits.index') }}">
            <x-button class="flex ">
                <i class="flex fi-rr-arrow-left mr-2"></i>
                {{ __('Back') }}
            </x-button>
        </a>
    </x-slot>

    <x-form-card action="{{ route('visits.update', $visit->id) }}" title="Create New Visit" method="PUT">
        <x-slot name="body">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                <x-label for="name" value="Visit Date" />
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="flex space-x-2">
                        <div class="text-center font-semibold text-gray-600">
                            <x-select id="month" name="month">
                                @foreach ($months as $key => $m)
                                    <option value={{ $key + 1 }} @if ($key + 1 == $month) selected @endif>
                                        {{ __($m) }}
                                    </option>
                                @endforeach
                            </x-select>
                            {{ date('M', strtotime($visit->visit_date)) }}
                        </div>

                        <div class="text-center font-semibold text-gray-600">
                            <x-select id="day" name="day">
                                @for ($i = 1; $i <= 30; $i++)
                                    <option value={{ $i }} @if ($i == $day) selected @endif>
                                        {{ $i }}</option>
                                @endfor
                            </x-select>
                            {{ date('d', strtotime($visit->visit_date)) }}
                        </div>

                        <div class="text-center font-semibold text-gray-600">
                            <x-select id="year" name="year">
                                @for ($i = 2014; $i <= 2024; $i++)
                                    <option value={{ $i }}
                                        @if ($i == $year) selected @endif>
                                        {{ $i }}</option>
                                @endfor
                            </x-select>
                            {{ date('Y', strtotime($visit->visit_date)) }}
                        </div>
                    </div>
                    <x-input-error for="name" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                <x-label for="visitors" value="Visitors Full Name" />
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <x-input type="text" name="visitors" id="visitors" value="{{ $visit->visitor_list }}" />
                    <x-input-error for="visitors" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                <x-label for="email" value="Email" />
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <x-input type="email" name="email" id="email" value="{{ $visit->email }}" />
                    <x-input-error for="email" />
                </div>
            </div>

            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                <x-label for="purpose" value="Purpose of Visit" />
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <textarea name="Purpose of Visit" cols="70" rows="5" value="{{ $visit->purpose }}"></textarea>
                    <x-input-error for="purpose" />

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
                    <x-label for="has_carx" value="Has Car" />
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class=" w-1/3">
                            <x-multi-checkbox name="has_car" value="1" title="Check If Visitor Has Car"
                                checked="{{ $visit->has_car === 1 ?? '' ? true : false }}"
                                onclick="ShowHideDiv(this)" />
                        </div>

                        <div id="dvHasCar" class="mt-1 w-1/2"
                            style="display: {{ $visit->has_car === 1 ? 'block' : 'none' }}"">
                            <x-input type=" text" name="plates" value="{{ $visit->plates }}"
                                placeholder="AA B12345" />
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
