<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="_base_url" content="{{ url('/') }}">

        <title>{{ config('app.name') }}</title>

        <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
    </head>
    <body>
        <x-partials.navbar></x-partials.navbar>
        <div id="right-col" style="margin-left: 250px;">
            <div class="uk-container uk-align-center uk-margin-medium-top">
                <div class="uk-grid-large uk-child-width-3-4" data-uk-grid>
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </div>
        </div>

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit-icons.min.js"></script>
    <script src="{{ url(mix('js/app.js')) }}"></script>
        @livewireScripts
    </body>
</html>
