<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}"
        class="brand-link d-flex flex-column justify-content-center align-items-center py-2" style="height: 140px;">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="h-100 w-100 px-3"
            style="object-fit: contain;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="info d-flex align-items-center">
                <a href="#" class="d-block">
                    {{ auth()->user()?->name ?? '-' }}
                </a>
                <a class="py-1 ml-3 btn btn-sm btn-danger" href="{{ route('dashboard.logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard.admins.index') }}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.admins.*'),
                    ])>
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Admins</p>
                    </a>
                </li>

                <li class="nav-header text-uppercase" style="letter-spacing: 0.08em;">Operations</li>

                <li @class([
                    'nav-item',
                    'menu-open' =>
                        request()->routeIs('dashboard.services.*') ||
                        request()->routeIs('dashboard.sub-services.*') ||
                        request()->routeIs('dashboard.service-sub-services.*') ||
                        request()->routeIs('dashboard.network-member-service-sub-services.*'),
                ])>
                    <a href="#" @class([
                        'nav-link',
                        'active' =>
                            request()->routeIs('dashboard.services.*') ||
                            request()->routeIs('dashboard.sub-services.*') ||
                            request()->routeIs('dashboard.service-sub-services.*') ||
                            request()->routeIs('dashboard.network-member-service-sub-services.*'),
                    ])>
                        <i class="nav-icon fas fa-concierge-bell"></i>
                        <p>
                            Service Catalog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.services.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.services.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Support Services</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.sub-services.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.sub-services.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Main Services</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="{{ route('dashboard.service-sub-services.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.service-sub-services.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Services Pairs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.network-member-service-sub-services.index') }}"
                                @class([
                                    'nav-link',
                                    'active' => request()->routeIs(
                                        'dashboard.network-member-service-sub-services.*'),
                                ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Provider Qualifications</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li @class([
                    'nav-item',
                    'menu-open' =>
                        request()->routeIs('dashboard.governorates.*') ||
                        request()->routeIs('dashboard.regions.*'),
                ])>
                    <a href="#" @class([
                        'nav-link',
                        'active' =>
                            request()->routeIs('dashboard.governorates.*') ||
                            request()->routeIs('dashboard.regions.*'),
                    ])>
                        <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>
                            Locations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.governorates.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.governorates.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Governorates</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.regions.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.regions.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Regions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li @class([
                    'nav-item',
                    'menu-open' =>
                        request()->routeIs('dashboard.organizations.*') ||
                        request()->routeIs('dashboard.service-requesters.*') ||
                        request()->routeIs('dashboard.network-members.*') ||
                        request()->routeIs('dashboard.cases.*'),
                ])>
                    <a href="#" @class([
                        'nav-link',
                        'active' =>
                            request()->routeIs('dashboard.organizations.*') ||
                            request()->routeIs('dashboard.service-requesters.*') ||
                            request()->routeIs('dashboard.network-members.*') ||
                            request()->routeIs('dashboard.cases.*'),
                    ])>
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Stakeholders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.organizations.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.organizations.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Organizations</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.service-requesters.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.service-requesters.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service Requesters</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.cases.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.cases.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cases</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.network-members.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.network-members.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Support Service Providers</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-header text-uppercase" style="letter-spacing: 0.08em;">Content</li>

                {{-- organizations --}}
                <li @class([
                    'nav-item',
                    'menu-open' =>
                        request()->routeIs('dashboard.aboutUs.*') ||
                        request()->routeIs('dashboard.Vision.*') ||
                        request()->routeIs('dashboard.Mission.*') ||
                        request()->routeIs('dashboard.Values.*'),
                ])>
                    <a href="#" @class([
                        'nav-link',
                        'active' =>
                            request()->routeIs('dashboard.aboutUs.*') ||
                            request()->routeIs('dashboard.Vision.*') ||
                            request()->routeIs('dashboard.Mission.*') ||
                            request()->routeIs('dashboard.Values.*'),
                    ])>
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Organization
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.aboutUs.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.aboutUs.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Us</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.Vision.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.Vision.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Our Vision</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.Mission.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.Mission.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Our Mission</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.Values.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.Values.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Our Values</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- policies --}}
                <li @class([
                    'nav-item',
                    'menu-open' =>
                        request()->routeIs('dashboard.termsAndConditions.*') ||
                        request()->routeIs('dashboard.privacyPolicy.*'),
                ])>
                    <a href="#" @class([
                        'nav-link',
                        'active' =>
                            request()->routeIs('dashboard.termsAndConditions.*') ||
                            request()->routeIs('dashboard.privacyPolicy.*'),
                    ])>
                        <i class="nav-icon fas fa-file-contract"></i>
                        <p>
                            Policies
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.termsAndConditions.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.termsAndConditions.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Terms And Conditions</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.privacyPolicy.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.privacyPolicy.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Privacy Policy</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Resources --}}
                <li @class([
                    'nav-item',
                    'menu-open' =>
                        request()->routeIs('dashboard.resource-categories.*') ||
                        request()->routeIs('dashboard.resource-items.*'),
                ])>
                    <a href="#" @class([
                        'nav-link',
                        'active' =>
                            request()->routeIs('dashboard.resource-categories.*') ||
                            request()->routeIs('dashboard.resource-items.*'),
                    ])>
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Resources
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.resource-categories.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.resource-categories.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.resource-items.index') }}" @class([
                                'nav-link',
                                'active' => request()->routeIs('dashboard.resource-items.*'),
                            ])>
                                <i class="far fa-circle nav-icon"></i>
                                <p>Resource Items</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.directories.index') }}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.directories.*'),
                    ])>
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>Directories</p>
                    </a>
                </li>

                {{-- Resources --}}
                {{-- [resource categories, resource items ] --}}

                {{-- =================================================== --}}

                <li class="nav-header text-uppercase" style="letter-spacing: 0.08em;">Support</li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.support-requests.index') }}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.support-requests.*'),
                    ])>
                        <i class="nav-icon fas fa-hand-holding-heart"></i>
                        <p>Support Requests</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard.support-tickets.index') }}" @class([
                        'nav-link',
                        'active' => request()->routeIs('dashboard.support-tickets.*'),
                    ])>
                        <i class="nav-icon fas fa-life-ring"></i>
                        <p>Support Tickets</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
