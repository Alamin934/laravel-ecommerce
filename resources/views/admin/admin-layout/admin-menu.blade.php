<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    {{-- Dashboard Logo/Text --}}
    <div class="app-brand demo">
        <a href="{{route('admin.dashboard')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">Laravel.Ecom</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    {{-- Menu Start --}}
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- Category -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Category</span>
        </li>
        <!-- Category Item -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="All Category">All Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Add Category">Add Category</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Sub Category -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Sub Category</span>
        </li>
        <!-- Sub Category Item -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-dock-bottom"></i>
                <div data-i18n="Account Settings">Sub Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="All Category">All Sub Category</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Add Category">Add Sub Category</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Product -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Product</span>
        </li>
        <!-- Product Item -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-package"></i>
                <div data-i18n="Account Settings">Product</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="All Category">All Product</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Add Category">Add Product</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Orders -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Orders</span>
        </li>
        <!-- Product Item -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-shopping-bags"></i>
                <div data-i18n="Account Settings">Orders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="All Category">All Orders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="All Category">Pending Orders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="All Category">Completed Orders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Add Category">Canceled Orders</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    {{-- Menu End --}}
</aside>