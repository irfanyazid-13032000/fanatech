<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="100">
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
        @if (Auth::user()->role === 'Admin')
            <li
                class="menu-item {{ Route::is('inventory.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Inventories </div>
                </a>

                <ul class="menu-sub">
                   
                        <li class="menu-item {{ Route::is('inventory.*') ? 'active' : '' }}">
                            <a href="{{ route('inventory.index') }}" class="menu-link active">
                                <div>Inventory</div>
                            </a>
                        </li>
                      
                   
                </ul>
            </li>


            <li
                class="menu-item {{ Route::is('sale.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Sale </div>
                </a>

                <ul class="menu-sub">
                   
                        <li class="menu-item {{ Route::is('sale.*') ? 'active' : '' }}">
                            <a href="{{ route('sale.index') }}" class="menu-link active">
                                <div>Sales</div>
                            </a>
                        </li>
                      
                   
                </ul>
            </li>
        

        <li
                class="menu-item {{ Route::is('asesor.*') || Route::is('undangan.*') || Route::is('berita.*') || Route::is('lampiran.*') ? 'active open' : '' }}">
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
                        <li class="menu-item {{ Route::is('asesor.*') ? 'active' : '' }}">
                            <a href="{{route('asesor.index')}}" class="menu-link active">
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

        @endif


        @if (Auth::user()->role === 'user')
        
        <li
        class="menu-item {{ Route::is('download.*') || Route::is('invoice.*')  ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Download APL </div>
                </a>

                <ul class="menu-sub">
                        
                        <li class="menu-item {{ Route::is('download.*') ? 'active' : '' }}">
                            <a href="{{route('download.file',['file'=>'APL01 dan APL02 Skema 1.docx'])}}" class="menu-link active">
                                <div>APL 01</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('download.*') ? 'active' : '' }}">
                        <a href="{{route('download.file',['file'=>'APL01 dan APL02 Skema 1.docx'])}}" class="menu-link active">
                                <div>APL 02 Skema 1</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('download.*') ? 'active' : '' }}">
                        <a href="{{route('download.file',['file'=>'APL01 dan APL02 Skema 2.docx'])}}" class="menu-link active">
                                <div>APL 02 Skema 2</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('download.*') ? 'active' : '' }}">
                        <a href="{{route('download.file',['file'=>'APL01 dan APL02 Skema 3.docx'])}}" class="menu-link active">
                                <div>APL 02 Skema 3</div>
                            </a>
                        </li>
                </ul>
        </li>
        
        <li
        class="menu-item {{ Route::is('confirm.*') || Route::is('invoice.*')  ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Upload APL </div>
                </a>

                <ul class="menu-sub">
                    
                    <li class="menu-item {{ Route::is('download.*') ? 'active' : '' }}">
                        <a href="{{route('download.file',['file'=>'APL01 dan APL02 Skema 1.docx'])}}" class="menu-link active">
                            <div>APL 01</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Route::is('download.*') ? 'active' : '' }}">
                        <a href="{{route('download.file',['file'=>'APL01 dan APL02 Skema 1.docx'])}}" class="menu-link active">
                                <div>APL 02 Skema 1</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('download.*') ? 'active' : '' }}">
                        <a href="{{route('download.file',['file'=>'APL01 dan APL02 Skema 2.docx'])}}" class="menu-link active">
                            <div>APL 02 Skema 2</div>
                        </a>
                        </li>
                        <li class="menu-item {{ Route::is('download.*') ? 'active' : '' }}">
                        <a href="{{route('download.file',['file'=>'APL01 dan APL02 Skema 3.docx'])}}" class="menu-link active">
                                <div>APL 02 Skema 3</div>
                            </a>
                        </li>
                </ul>
        </li>
    
@endif

    </ul>
</aside>
<!-- / Menu -->
