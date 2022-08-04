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


    <!-- Create Post -->
    <div>
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 text-sm font-semibold align:right text-gray-100 bg-red-700 rounded-md shadow-md hover:bg-red-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                <a href="{{ route('visit.index') }}">Back</a>
            </button>
        </div>

        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('locale.visit') }}</label>

        <div>

            <div class="mt-1 ">
                <select id="month" name="month">
                    @foreach ($months as $key => $month)
                        <option value="{{ $key + 1 }}" <?php
                        if ($month == $ethipic->getTextualMonth()) {
                            echo 'selected';
                        }
                        ?>>{{ $month }}</option>
                    @endforeach
                </select>
                <select id="day" name="day">
                    @for ($i = 1; $i <= 30; $i++)
                        <option value="{{ $i }}" <?php
                        if ($i == $ethipic->getDayTwoDigit()) {
                            echo 'selected';
                        }
                        ?>>{{ $i }}</option>
                    @endfor


                </select>
                <select id="year" name="year">
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>


                </select>

            </div>
        </div>

        <div class="form-group row">
            <label for="visitors"
                class="col-md-4 col-form-label text-md-right">{{ __('locale.visitors_full_name') }}</label>
            <div class="col-md-6">
                <select id="visitors" name="visitors[]" multiple="multiple" class="form-control" style="width: 100%">

                </select>
            </div>
        </div>

        <div class="block">
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" checked />
                    <span class="ml-2">has car</span>
                </label>
            </div>
        </div>




        <div class="flex items-center justify-start mt-4 gap-x-2">
            <button type="submit"
                class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                Save
            </button>
            <button type="submit"
                class="px-6 py-2 text-sm font-semibold text-gray-100 bg-red-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                Cancel
            </button>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>

</x-admin-layout>
