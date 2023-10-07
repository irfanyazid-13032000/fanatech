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
        @if (Auth::user()->role === 'Admin' || Auth::user()->role === 'manager')
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
                class="menu-item {{ Route::is('purchase.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Purchase </div>
                </a>

                <ul class="menu-sub">
                   
                        <li class="menu-item {{ Route::is('purchase.*') ? 'active' : '' }}">
                            <a href="{{ route('purchase.index') }}" class="menu-link active">
                                <div>Purchase</div>
                            </a>
                        </li>
                      
                   
                </ul>
            </li>
        



        
        @endif


        @if (Auth::user()->role === 'sales')
       
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
        
    
        @endif



        @if (Auth::user()->role === 'purchase')


        <li
                class="menu-item {{ Route::is('purchase.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Purchase </div>
                </a>

                <ul class="menu-sub">
                   
                        <li class="menu-item {{ Route::is('purchase.*') ? 'active' : '' }}">
                            <a href="{{ route('purchase.index') }}" class="menu-link active">
                                <div>Purchase</div>
                            </a>
                        </li>
                      
                   
                </ul>
            </li>
        
        
        @endif
        
        

    </ul>
</aside>
<!-- / Menu -->
