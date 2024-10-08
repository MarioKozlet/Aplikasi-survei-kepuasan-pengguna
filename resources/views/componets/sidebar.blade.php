        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Menu</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                {{-- 
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Pengaturan</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings">Pengaturan Akun</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="pages-account-settings-account.html" class="menu-link">
                                <div data-i18n="Account">Profile</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="pages-account-settings-notifications.html" class="menu-link">
                                <div data-i18n="Notifications">Akun</div>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Main Menu</span>
                </li>
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div data-i18n="Account Settings">Master</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('survey.index') }}" class="menu-link">
                                <div data-i18n="Account">Survei Analisis</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
