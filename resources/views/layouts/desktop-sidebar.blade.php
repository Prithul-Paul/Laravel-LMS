<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('dashboard')}}">
            <img src="{{asset('assets/images/mountain-book-logo-260nw-643141864.png')}}" alt="CoolAdmin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="@yield('dashboard_active_class')">
                    <a href="{{route('dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="@yield('author_active_class')">
                    <a href="{{route('authors')}}">
                        <i class="fas fa-universal-access"></i>Authors</a>
                </li>
                <li class="@yield('publisher_active_class')">
                    <a href="{{route('publishers')}}">
                        <i class="fas fa-address-card"></i>Publishers</a>
                </li>
                <li class="@yield('category_active_class')">
                    <a href="{{route('categories')}}">
                        <i class="fas fa-tachometer-alt"></i>Categories</a>
                </li>
                <li class="@yield('book_active_class')">
                    <a href="{{route('books')}}">
                        <i class="fas fa-tachometer-alt"></i>Books</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>