<!-- LEFT BAR -->
<aside id="left-col" class="uk-light uk-visible@m">
    <div class="left-logo uk-flex uk-flex-middle">
        <img class="custom-logo" src="https://raw.githubusercontent.com/zzseba78/Kick-Off/master/img/dashboard-logo.svg" alt="">
    </div>
    @guest
        <div class="left-nav-wrap">
            <ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>
                <li class="uk-nav-header uk-text-uppercase">Authentication</li>
                <li class="{{ is_route_active('login') }}">
                    <a href="{{ route('login') }}">
                        <span data-uk-icon="sign-in"></span> Login
                    </a>
                </li>
                <li class="{{ is_route_active('register') }}">
                    <a href="{{ route('register') }}">
                        <span data-uk-icon="plus-circle"></span> Register
                    </a>
                </li>
            </ul>
        </div>
    @endguest
    <div class="left-content-box content-box-dark {{ ! auth()->check() ? 'uk-hidden' : '' }}">
        @auth
            <img src="https://raw.githubusercontent.com/zzseba78/Kick-Off/master/img/avatar.svg" alt="" class="uk-border-circle profile-img">
            <h4 class="uk-text-center uk-margin-remove-vertical">
                {{ auth()->user()->username }}
            </h4>
            <div class="uk-position-relative uk-text-center uk-display-block">
                <a
                    href="#"
                    class="uk-text-small uk-display-block uk-text-center {{ getRoleColor(auth()->user()->role_id) }}"
                    data-uk-icon="icon: triangle-down; ratio: 0.7"
                >
                    {{ Str::ucfirst(auth()->user()->role->role_name) }}
                </a>
                <!-- user dropdown -->
                <div
                    class="uk-dropdown user-drop"
                    data-uk-dropdown="mode: click; pos: bottom-center; animation: uk-animation-slide-bottom-small; duration: 150"
                >
                    <ul class="uk-nav uk-dropdown-nav uk-text-left">
                        <li>
                            <a href="#">
                                <span data-uk-icon="info"></span> Summary
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span data-uk-icon="refresh"></span> Edit
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span data-uk-icon="settings"></span> Configuration
                            </a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li>
                            <a href="#">
                                <span data-uk-icon="image"></span> Your Data
                            </a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li>
                            <a href="#">
                                <span data-uk-icon="sign-out"></span> Sign Out
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
                <li class="uk-parent">
                    <a href="#">
                        <span data-uk-icon="git-branch" class="uk-margin-small-right"></span>
                        Projects
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#">Create a new project</a>
                        </li>
                        <li>
                            <a href="#">See all projects</a>
                        </li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">
                        <span data-uk-icon="file-text" class="uk-margin-small-right"></span>
                        Tasks
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#">Create a new task</a>
                        </li>
                        <li>
                            <a href="#">See all tasks</a>
                        </li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">
                        <span data-uk-icon="user" class="uk-margin-small-right"></span>
                        Users
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#">Create a new user</a>
                        </li>
                        <li>
                            <a href="#">See all users</a>
                        </li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">
                        <span data-uk-icon="users" class="uk-margin-small-right"></span>
                        Customers
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#">Create a new customer</a>
                        </li>
                        <li>
                            <a href="#">See all customers</a>
                        </li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">
                        <span data-uk-icon="cloud-upload" class="uk-margin-small-right"></span>
                        Hostings
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#">Create a new hosting</a>
                        </li>
                        <li>
                            <a href="#">See all hostings</a>
                        </li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">
                        <span data-uk-icon="server" class="uk-margin-small-right"></span>
                        Servers
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <a href="#">Create a new server</a>
                        </li>
                        <li>
                            <a href="#">See all available servers</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="left-content-box uk-margin-top">
                <h5>Daily Reports</h5>
                <div>
                    <span class="uk-text-small">
                        Traffic <small>(+50)</small>
                    </span>
                    <progress class="uk-progress" value="50" max="100"></progress>
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
                    <progress class="uk-progress warning" value="12" max="100"></progress>
                </div>
            </div>
        </div>
        <div class="bar-bottom">
            <ul class="uk-subnav uk-flex uk-flex-center uk-child-width-1-5" data-uk-grid>
                <li>
                    <a href="#" class="uk-icon-link" data-uk-icon="home" title="Home" data-uk-tooltip></a>
                </li>
                <li>
                    <a href="#" class="uk-icon-link" data-uk-icon="settings" title="Settings" data-uk-tooltip></a>
                </li>
                <li>
                    <a href="#" class="uk-icon-link" data-uk-icon="bell" title="Notifications" data-uk-tooltip></a>
                </li>
                <li>
                    <a
                        href="{{ route('logout') }}"
                        class="uk-icon-link"
                        data-uk-tooltip="Sign out"
                        data-uk-icon="sign-out"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="uk-hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        @endauth
    </div>
</aside>
<!-- /LEFT BAR -->
