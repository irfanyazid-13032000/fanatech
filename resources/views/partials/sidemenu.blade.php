<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="100">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if (request()->is('/')) active @endif">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        @if (Auth::user()->role === 'Admin' || Auth::user()->role === 'HRD')
            <li
                class="menu-item {{ Route::is('skk.*') || Route::is('divisi.*') || Route::is('rekap.*') || Route::is('intern.*') || Route::is('role.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Skk </div>
                </a>

                <ul class="menu-sub">
                    @if (Auth::user()->role === 'Admin')
                        <li class="menu-item {{ Route::is('skk.*') ? 'active' : '' }}">
                            <a href="{{ route('skk.index') }}" class="menu-link active">
                                <div>Get SKK</div>
                            </a>
                        </li>
                    
                      
                       
                    @elseif (Auth::user()->role === 'HRD')
                        <li class="menu-item {{ Route::is('intern.*') ? 'active' : '' }}">
                            <a href="{{ route('intern.index') }}" class="menu-link active ">
                                <div>Data Anggota Magang</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('divisi.*') ? 'active' : '' }}">
                            <a href="{{ route('divisi.index') }}" class="menu-link">
                                <div>Master Divisi</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('rekap.*') ? 'active' : '' }}">
                            <a href="{{ route('rekap.absensi') }}" class="menu-link">
                                <div>Rekap Absensi</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('approval.*') ? 'active' : '' }}">
                            <a href="" class="menu-link">
                                <div>Approval</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('responsibility.*') ? 'active' : '' }}">
                            <a href="" class="menu-link">
                                <div>Tanggung jawabmu</div>
                            </a>
                        </li>
                    @else
                        <li class="menu-item">
                            <a href="" class="menu-link">
                                <div>Absensi</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
    

    </ul>
</aside>
<!-- / Menu -->
