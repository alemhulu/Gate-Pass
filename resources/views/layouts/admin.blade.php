<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Track and Trace') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    @livewireStyles
    <link href="/css/uicons.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        <x-side-navigation.desktop />


        <div class="md:pl-64 flex flex-col flex-1">

            
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="my-3 shadow mx-3 rounded-lg bg-yellow-400">
                    <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 horizontal-btn-active rounded-lg ">
                        {{ $header }}
                    </div>
                </header>
                <!-- Page Content -->
                <main class="m-3">
                <x-error-message />
            <x-session-message />
                    {{ $slot }}
                </main>
            @endif
        </div>
    </div>

    <x-toast.notification />
    @stack('modals')

    @livewireScripts
    <script src="/js/tabs.js"></script>
    <script>
        var form = $('#request-form'),
            checkbox = $('#hasCar'),
            chShipBlock = $('#plateNumberBlock');

        chShipBlock.hide();

        checkbox.on('click', function() {
            if ($(this).is(':checked')) {
                chShipBlock.show();
                chShipBlock.find('input').attr('required', true);
            } else {
                chShipBlock.hide();
                chShipBlock.find('input').attr('required', false);
            }
        });
    </script>
    <script>
        $('#plateNumber').select2({
            tags: true,
            tokenSeparators: [','],
            placeholder: "አንዱን ታረጋ አስገብተው ሲጨርሱ 'Enter' ይጫኑ",
            /* the next 2 lines make sure the user can click away after typing and not lose the new tag */
            selectOnClose: false,
            closeOnSelect: false
        });
    </script>
    <script>
        $('#visitors').select2({
            tags: true,
            tokenSeparators: [','],
            placeholder: "አንዱን ስም አስገብተው ሲጨርሱ 'Enter' ይጫኑ",
            /* the next 2 lines make sure the user can click away after typing and not lose the new tag */
            selectOnClose: false,
            closeOnSelect: false
        });
    </script>
</body>

</html>
