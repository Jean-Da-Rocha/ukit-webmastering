<div x-show="$screen('xs') && !$screen('lg')" x-cloak x-data>
    <nav class="uk-navbar uk-navbar-container uk-margin">
        <div class="uk-navbar-left">
            <button
                class="uk-navbar-toggle"
                uk-navbar-toggle-icon
                uk-toggle="target: #offcanvas-nav"
            >
            </button>
        </div>
    </nav>

    <div id="offcanvas-nav" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar">
            <x-layouts.sidebar_content form-id="mobile-logout-form" />
        </div>
    </div>
</div>
