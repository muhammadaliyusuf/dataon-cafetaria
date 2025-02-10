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
        </ul>
    </div>
</nav>