<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Admin Controls</li>

            <li class="nav-item {{ active_class(['add/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#add" role="button"
                    aria-expanded="{{ is_active_route(['add/*']) }}" aria-controls="add">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">ADD </span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['add/*']) }}" id="add">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/add_items') }}" class="nav-link {{ active_class(['add_items']) }}">Add
                                Items</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('/add_users') }}" class="nav-link {{ active_class(['add_users']) }}">Add
                                Users</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('/add_customer') }}"
                                class="nav-link {{ active_class(['add_customer']) }}">Add Customer</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/add_donation') }}"
                                class="nav-link {{ active_class(['add_donation']) }}">Add Donation</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['view/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#view" role="button"
                    aria-expanded="{{ is_active_route(['view/*']) }}" aria-controls="view">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">View</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['view/*']) }}" id="view">
                    <ul class="nav sub-menu">

                        <li class="nav-item">
                            <a href="{{ url('/view_Customers') }}"
                                class="nav-link {{ active_class(['view_Customers']) }}">View Customers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/view_items') }}"
                                class="nav-link {{ active_class(['view_items']) }}">View Items</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/view_sales') }}"
                                class="nav-link {{ active_class(['view_sales']) }}">View Sales</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/view_donation') }}"
                                class="nav-link {{ active_class(['view_donation']) }}">View Donations</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ active_class(['sale/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#sale" role="button"
                    aria-expanded="{{ is_active_route(['sale/*']) }}" aria-controls="sale">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Sale</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['sale/*']) }}" id="sale">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/sale') }}" class="nav-link {{ active_class(['sale']) }}">Sale
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


        </ul>
    </div>
</nav>

