<div id="sidebar" class="bg-dark p-3">
    <ul class="navbar-nav text-white">
        <li class="nav-item text-center mt-3">
            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="nav-link text-white" href="{{ Route('admin.projects.index') }}">{{ __('Projects') }}</a>
            <a class="nav-link text-white" href="{{ Route('admin.projects.create') }}">{{ __('Add') }}</a>
        </li>
    </ul>
</div>
