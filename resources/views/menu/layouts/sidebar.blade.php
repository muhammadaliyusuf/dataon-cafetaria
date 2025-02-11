<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/menu">
                    <span data-feather="home"></span>
                    Menu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('order*') ? 'active' : '' }}" href="/order">
                    <span data-feather="file-text"></span>
                    Orders
                </a>
            </li>

            {{-- @can('admin') --}}
            {{-- @if(Gate::allows('admin')) --}}
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('menu/create') ? 'active' : '' }}" href="/menu/create">
                        <span data-feather="plus-circle"></span>
                        Add Menu
                    </a>
                </li>
            </ul>
            {{-- @endif --}}
            {{-- @endcan --}}
            
        </ul>
    </div>
</nav>