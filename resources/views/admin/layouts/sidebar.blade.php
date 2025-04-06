<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('images/logo.png') }}"
                            alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.subscribers.index') }}" class="sidebar-link">
                        <i class="bi bi-envelope-fill"></i>
                        <span>Subscribers</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('admin.categories.index') }}" class='sidebar-link'>
                        <i class="bi bi-folder"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('admin.products.index') }}" class='sidebar-link'>
                        <i class="bi bi-box"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ route('admin.banners.index') }}" class='sidebar-link'>
                        <i class="bi bi-image"></i>
                        <span>Banners</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.contacts.index') }}" class="sidebar-link">
                        <i class="bi bi-chat-dots-fill"></i>
                        <span>Messages</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.factories.index') }}" class='sidebar-link'>
                        <i class="bi bi-building"></i>
                        <span>Factories</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.farms.index') }}" class='sidebar-link'>
                        <i class="bi bi-tree"></i>
                        <span>Farms</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
