<div class="uk-margin-bottom">
    {{-- UIKit Success Alert --}}
    @if (session()->has('success'))
        <div class="uk-alert-success" id="alert-message" data-uk-alert>
            <a class="uk-alert-close" data-uk-close></a>
            <p>{{ session('success') }}</p>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        if (document.getElementById('alert-message')) {
            window.Livewire.onLoad(() => {
                setTimeout(() => UIkit.alert('#alert-message').close(), 5000);
            });
        }

        window.livewire.hook('element.updated', (component) => {
            setTimeout(() => UIkit.alert('#alert-message').close(), 5000);
        });
    </script>
@endpush
