<header id="header" class="header-transparent header-semi-transparent header-semi-transparent-light"
    data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': false, 'stickyStartAt': 1, 'stickySetTop': '1'}">
    <div class="header-body border-top-0 h-auto box-shadow-none">
        <div class="header-container header-container-height-sm container p-static">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo relative">
                            <a href="/">
                                <img alt="logo" width=280 height=80 src="/logo/logo.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-dropdown-border-radius header-nav-main-text-capitalize header-nav-main-text-size-4 header-nav-main-arrows header-nav-main-full-width-mega-menu header-nav-main-mega-menu-bg-hover header-nav-main-effect-2">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                                                href="/">
                                                Home
                                            </a>
                                        </li>

                                        <li>
                                            <a class="nav-link {{ request()->routeIs('about-us') ? 'active' : '' }}"
                                                href="/about-us">
                                                About Us
                                            </a>
                                        </li>

                                        <li>
                                            <a class="nav-link {{ request()->routeIs('our-business') ? 'active' : '' }}"
                                                href="/our-business">
                                                Our Businesses
                                            </a>
                                        </li>

                                        <li>
                                            <a class="nav-link {{ request()->routeIs('sister-campanies') ? 'active' : '' }}"
                                                href="/sister-campanies">
                                                Sister Companies
                                            </a>
                                        </li>

                                        <li>
                                            <a class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}"
                                                href="/contact-us">
                                                Contact Us
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
                                data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>