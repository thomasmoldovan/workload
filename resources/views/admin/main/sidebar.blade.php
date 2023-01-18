<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? "active" : "collapsed" }}" href="{{ route('dashboard') }}">
                <i class="fas fa-tachometer-alt sidebar-icon"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('colaborators.index') ? "active" : "collapsed" }}" href="{{ route('colaborators.index') }}">
                <i class="fas fa-graduation-cap sidebar-icon"></i>
                <span>Colaborators</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('promotions.index') ? "active" : "collapsed" }}" href="{{ route('promotions.index') }}">
                <i class="fas fa-certificate sidebar-icon"></i>
                <span>Promotions</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="fas fa-briefcase sidebar-icon"></i>
                <span>Projects</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('settings.index') }}">
                <i class="fas fa-user sidebar-icon"></i>
                <span>Settings</span>
            </a>
        </li>

    </ul>
</aside>
