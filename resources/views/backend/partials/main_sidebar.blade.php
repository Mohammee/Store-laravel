<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item  {{ session()->get('page') == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{ trans('main_sidebar.Home') }}</span>
                </a>
            </li>

            <li class="nav-item {{ session()->get('page') == 'store' ? 'active' : '' }} ">
                <a href="#">
                    <i class="la la-shopping-cart"></i>
                <span class="menu-title" data-i18n="nav.dash.main">Store</span>
                <span
                    class="badge badge badge-info badge-pill float-right mr-2">6</span>
            </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.products.index') }}" data-i18n="nav.dash.crypto">
                            Products
                        </a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('admin.categories.index') }}" data-i18n="nav.dash.crypto">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('admin.brands.index') }}" data-i18n="nav.dash.crypto">
                            Brands
                        </a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('admin.banners.index') }}" data-i18n="nav.dash.crypto">
                            Banners
                        </a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('admin.attributes.index') }}" data-i18n="nav.dash.crypto">
                            Attributes
                        </a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('admin.colors.index') }}" data-i18n="nav.dash.crypto">
                            Colors
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                <span class="menu-title" data-i18n="nav.dash.main">الفرق </span>
                <span
                    class="badge badge badge-danger badge-pill float-right mr-2"></span>
            </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                        فريق </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                <span class="menu-title" data-i18n="nav.dash.main">المدربين  </span>
                <span
                    class="badge badge badge-success badge-pill float-right mr-2"></span>
            </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                        مدرب </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item {{ session()->get('page') == 'moderators' ? 'active' : '' }}"><a href=""><i class="la la-user-secret"></i>
                <span class="menu-title" data-i18n="nav.dash.main"> Moderators </span>
                <span
                    class="badge badge badge-warning  badge-pill float-right mr-2">1</span>
            </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="{{ route('admin.moderators.index') }}" data-i18n="nav.dash.crypto">
                            Moderators
                         </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">تذاكر المراسلات   </span>
                    <span
                        class="badge badge badge-danger  badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> تذاكر الطلاب </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
