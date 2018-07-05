<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><p class="admin">ADMIN DASHBOARD</p></a>
</div>

<ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" id="name_admin">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item" href="{!!URL::to('admin/useradmin')!!}">
                    <p>Thông tin cá nhân</p>
                </a>
                <a href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ 'App\Admin' == Auth::getProvider()->getModel() ? route('admin.logout') : route('logout') }}" method="   POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>

    </li>
</ul>
