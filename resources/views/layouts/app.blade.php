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

        <x-layouts.desktop_sidebar />
        <x-layouts.mobile_sidebar />

        <div
            id="right-col"
            :style="$screen('lg') ? 'margin-left: 250px;' : 'margin-left: unset;'"
            x-cloak
            x-data
        >
            <div
                class="uk-align-center uk-margin-medium-top"
                :class="$screen('2xl') ? 'uk-container-large' : 'uk-container'"
            >
                <div class="uk-grid-large uk-child-width-3-4" data-uk-grid>
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </div>
        </div>

        <script src="{{ url(mix('js/manifest.js')) }}"></script>
        <script src="{{ url(mix('js/vendor/uikit.js')) }}"></script>
        <script src="{{ url(mix('js/vendor/alpine.js')) }}" defer></script>
        <script src="{{ url(mix('js/app.js')) }}"></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
