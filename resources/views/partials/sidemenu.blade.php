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
                class="menu-item {{ Route::is('skk.*') || Route::is('pelatihan.*') || Route::is('pendidikan.*') || Route::is('personalia.*') || Route::is('pengalaman.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">SKK </div>
                </a>

                <ul class="menu-sub">
                    @if (Auth::user()->role === 'Admin')
                        <li class="menu-item {{ Route::is('skk.*') ? 'active' : '' }}">
                            <a href="{{ route('skk.index') }}" class="menu-link active">
                                <div>Klasifikasi Kualifikasi</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('pelatihan.*') ? 'active' : '' }}">
                            <a href="{{ route('pelatihan.index') }}" class="menu-link active">
                                <div>Pelatihan</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('pendidikan.*') ? 'active' : '' }}">
                            <a href="{{ route('pendidikan.index') }}" class="menu-link active">
                                <div>Pendidikan</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('personalia.*') ? 'active' : '' }}">
                            <a href="{{ route('personalia.index') }}" class="menu-link active">
                                <div>Personalia</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('pengalaman.*') ? 'active' : '' }}">
                            <a href="{{ route('pengalaman.index') }}" class="menu-link active">
                                <div>Pengalaman</div>
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

        <li
                class="menu-item {{ Route::is('skk.*')  ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Assesment </div>
                </a>

                <ul class="menu-sub">
                        <li class="menu-item {{ Route::is('assessment.*') ? 'active' : '' }}">
                            <a href="#" class="menu-link active">
                                <div>Jadwal Assesment</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('assessor.*') ? 'active' : '' }}">
                            <a href="{{route('assessor.index')}}" class="menu-link active">
                                <div>Surat Tugas Assessor</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('undangan.*') ? 'active' : '' }}">
                            <a href="{{route('undangan.index')}}" class="menu-link active">
                                <div>Surat Undangan TKK</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('berita.*') ? 'active' : '' }}">
                            <a href="{{route('berita.index')}}" class="menu-link active">
                                <div>Berita Acara</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('lampiran.*') ? 'active' : '' }}">
                            <a href="{{route('lampiran.index')}}" class="menu-link active">
                                <div>Lampiran</div>
                            </a>
                        </li>
                </ul>
        </li>



        <li
                class="menu-item {{ Route::is('confirm.*') || Route::is('invoice.*')  ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Payment </div>
                </a>

                <ul class="menu-sub">
                        <li class="menu-item {{ Route::is('invoice.*') ? 'active' : '' }}">
                            <a href="{{route('invoice.index')}}" class="menu-link active">
                                <div>Invoice</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('confirm.*') ? 'active' : '' }}">
                            <a href="{{route('confirm.index')}}" class="menu-link active">
                                <div>Konfirmasi Pembayaran</div>
                            </a>
                        </li>
                </ul>
        </li>
    

    </ul>
</aside>
<!-- / Menu -->
