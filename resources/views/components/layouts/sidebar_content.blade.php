@props(['formId' => 'desktop-logout-form'])

@guest
    <div class="left-nav-wrap">
        <ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>
            <li class="uk-nav-header uk-text-uppercase">
                Authentication
            </li>
            <li class="{{ is_active('login') }}">
                <a href="{{ route('login') }}">
                    <x-heroicon-o-login /> Login
                </a>
            </li>
            <li class="{{ is_active('register') }}">
                <a href="{{ route('register') }}">
                    <x-heroicon-o-user-add /> Register
                </a>
            </li>
        </ul>
    </div>
@endguest
<div class="left-content-box {{ ! $currentUser ? 'uk-hidden' : '' }}">
    @auth
        <img
            src="https://image.freepik.com/vecteurs-libre/fond-degrade-abstrait-demi-teinte_52683-42248.jpg"
            alt="{{ $currentUser->username }}'s profile picture"
            class="uk-border-circle profile-img"
        />
        <h4 class="uk-text-center uk-margin-remove-vertical">
            {{ ucfirst($currentUser->username) }}
        </h4>
        <div class="uk-position-relative uk-text-center uk-display-block">
            <a
                href="#"
                class="uk-text-small uk-display-block uk-text-center {{ get_role_color($currentUser->role_id) }}"
            >
                {{ ucfirst($currentUser->role->name) }} <x-heroicon-s-chevron-down />
            </a>
            <!-- user dropdown -->
            <div
                class="uk-dropdown user-drop"
                data-uk-dropdown="mode: click; pos: bottom-center; animation: uk-animation-slide-bottom-small; duration: 150"
            >
                <ul class="uk-nav uk-dropdown-nav uk-text-left">
                    <li>
                        <a href="{{ route('users.profile', $currentUser->id) }}">
                            <x-heroicon-o-information-circle /> Summary
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <x-heroicon-o-pencil-alt /> Edit
                        </a>
                    </li>
                    <li class="uk-nav-divider"></li>
                    <li>
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('{{ $formId }}').submit();"
                        >
                            <x-heroicon-o-logout /> Sign Out
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /user dropdown -->
        </div>
    </div>
    <div class="left-nav-wrap">
        <ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>
            <li class="uk-nav-header uk-text-uppercase">Actions</li>
            <li class="uk-parent {{ is_active('projects') }}">
                <a href="#">
                    <x-heroicon-o-view-grid class="uk-margin-small-right" />
                    Projects
                </a>
                <ul class="uk-nav-sub">
                    @can('performWebmasterAction')
                        <li>
                            <a href="{{ route('projects.create') }}">
                                Create a new project
                            </a>
                        </li>
                    @endcan
                    @can('performAdminAction')
                        <li>
                            <a href="{{ route('categories.index') }}">
                                Manage project categories
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ route('projects.index') }}">
                            See all projects
                        </a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent {{ is_active('tasks') }}">
                <a href="#">
                    <x-heroicon-o-clipboard-list class="uk-margin-small-right" />
                    Tasks
                </a>
                <ul class="uk-nav-sub">
                    <li>
                        <a href="{{ route('tasks.create') }}">
                            Create a new task
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tasks.index') }}">
                            See all tasks
                        </a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent {{ is_active('users') }}">
                <a href="#">
                    <x-heroicon-o-user class="uk-margin-small-right" />
                    Users
                </a>
                <ul class="uk-nav-sub">
                    @can('performAdminAction')
                        <li>
                            <a href="{{ route('users.create') }}">
                                Create a new user
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ route('users.index') }}">
                            See all users
                        </a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent {{ is_active('customers') }}">
                <a href="#">
                    <x-heroicon-o-user-group class="uk-margin-small-right" />
                    Customers
                </a>
                <ul class="uk-nav-sub">
                    @can('performWebmasterAction')
                        <li>
                            <a href="{{ route('customers.create') }}">
                                Create a new customer
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ route('customers.index') }}">
                            See all customers
                        </a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent {{ is_active('hostings') }}">
                <a href="#">
                    <x-heroicon-o-cloud-upload class="uk-margin-small-right" />
                    Hostings
                </a>
                <ul class="uk-nav-sub">
                    @can('performAdminAction')
                        <li>
                            <a href="{{ route('hostings.create') }}">
                                Create a new hosting
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ route('hostings.index') }}">
                            See all hostings
                        </a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent {{ is_active('servers') }}">
                <a href="#">
                    <x-heroicon-o-server class="uk-margin-small-right" />
                    Servers
                </a>
                <ul class="uk-nav-sub">
                    @can('performAdminAction')
                    <li>
                        <a href="{{ route('servers.create') }}">
                            Create a new server
                        </a>
                    </li>
                    @endcan
                    <li>
                        <a href="{{ route('servers.index') }}">
                            See all availables servers
                        </a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent {{ is_active('billing_status') }}">
                <a href="#">
                    <x-heroicon-o-ticket class="uk-margin-small-right" />
                    Billing status
                </a>
                <ul class="uk-nav-sub">
                    @can('performAdminAction')
                        <li>
                            <a href="{{ route('billing_status.create') }}">
                                Create a new billing status
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="{{ route('billing_status.index') }}">
                            See all available billing status
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="left-content-box uk-margin-top separator-top">
            <h5>Daily Reports</h5>
            <div>
                <span class="uk-text-small">
                    Traffic <small>(+50)</small>
                </span>
                <progress class="uk-progress primary" value="50" max="100"></progress>
            </div>
            <div>
                <span class="uk-text-small">
                    Income <small>(+78)</small>
                </span>
                <progress class="uk-progress success" value="78" max="100"></progress>
            </div>
            <div>
                <span class="uk-text-small">
                    Feedback <small>(-12)</small>
                </span>
                <progress class="uk-progress default" value="12" max="100"></progress>
            </div>
        </div>
        <div class="bar-bottom">
            <ul class="uk-subnav uk-flex uk-flex-center uk-child-width-1-5" data-uk-grid>
                <li class="{{ is_active('home') }}">
                    <a href="{{ route('home') }}" title="Home" data-uk-tooltip>
                        <x-heroicon-o-home />
                    </a>
                </li>
                @can('performWebmasterAction')
                    <li class="{{ is_active('settings') }}">
                        <a href="{{ route('settings.index') }}" title="Settings" data-uk-tooltip>
                            <x-heroicon-o-cog />
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="#" title="Notifications" data-uk-tooltip>
                        <x-heroicon-o-bell />
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('logout') }}"
                        data-uk-tooltip="Sign out"
                        onclick="event.preventDefault(); document.getElementById('{{ $formId }}').submit();"
                    >
                        <x-heroicon-o-logout />
                    </a>
                    <form
                        id="{{ $formId }}"
                        action="{{ route('logout') }}"
                        method="POST"
                        class="uk-hidden"
                    >
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @endauth
</div>
