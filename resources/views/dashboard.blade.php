<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container px-4 mx-auto">

                    <div class="p-1 m-1 bg-white rounded shadow">
                        {!! $chart->container() !!}
                    </div>


<script src="{{ @asset('vendor/larapex-charts/apexcharts.js') }}"></script>

    {{ $chart->script() }}
                </div>
            </div>g
        </div>
    </div>
</x-admin-layout>
