<div class="uk-margin-bottom">
    {{-- UIKit Success Alert --}}
    @if (session()->has('success'))
        <div class="uk-alert-success" id="alert-message" data-uk-alert>
            <a class="uk-alert-close" data-uk-close></a>
            <p>{{ session('success') }}</p>
        </div>
    @endif
</div>
