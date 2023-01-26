<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('overview.index') ? "active" : "collapsed" }}" href="{{ route('overview.index') }}">
                <i class="fas fa-eye sidebar-icon"></i>
                <span>Overview</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.index') ? "active" : "collapsed" }}" href="{{ route('dashboard.index') }}">
                <i class="fas fa-tachometer-alt sidebar-icon"></i>
                <span>Workload</span>
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
            <a class="nav-link {{ request()->routeIs('promotion-types.index') ? "active" : "collapsed" }}" href="{{ route('promotion-types.index') }}">
                <i class="fas fa-certificate sidebar-icon"></i>
                <span>Promotions Types</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('projects.index') ? "active" : "collapsed" }}" href="{{ route('projects.index') }}">
                <i class="fas fa-briefcase sidebar-icon"></i>
                <span>Projects</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('settings.index') ? "active" : "collapsed" }}" href="{{ route('settings.index') }}">
                <i class="fas fa-user sidebar-icon"></i>
                <span>Settings</span>
            </a>
        </li>

    </ul>
</aside>
