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
    <body
        x-data="{ windowWidth: window.innerWidth }"
        x-init="() => {
            window.onresize = () => {
                windowWidth = window.innerWidth
            }
        }"
    >

        <x-layouts.navbar />
        <x-layouts.mobile_navbar />

        <div
            id="right-col"
            :style="windowWidth >= 1024 ? 'margin-left: 250px;' : 'margin-left: unset;'"
        >
            <div
                class="uk-align-center uk-margin-medium-top"
                :class="windowWidth <= 1536 ? 'uk-container' : 'uk-container-large' "
            >
                <div class="uk-grid-large uk-child-width-3-4" data-uk-grid>
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </div>
        </div>

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit.min.js"></script>
        <script src="{{ url(mix('js/app.js')) }}"></script>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    </body>
</html>
