<div class="fixed top-0 left-0 z-50 w-64 h-full p-4 transition-transform bg-gray-900 sidebar-menu">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <img src="https://placehold.co/32x32" alt="" class="object-cover w-8 h-8 rounded">
        <span class="ml-3 text-lg font-bold text-white">Logo</span>
    </a>
    <ul class="mt-4">
        <li class="mb-1 group active">
            <a href="{{ route('dashboard') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950
                 hover:text-gray-100 rounded-md  @if (request()->routeIs('dashboard'))
                  group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-
                  [.selected]:text-gray-100 @endif ">
                <i class="mr-3 text-lg ri-bar-chart-line"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mb-1 group active">
            <a href="{{ route('admin.show.media') }}"
                class="flex items-center px-4 py-2 text-gray-300 rounded-md hover:bg-gray-950 hover:text-gray-100 ">
                <i class="mr-3 text-lg ri-folder-2-line"></i>
                <span class="text-sm">Media Library</span>
            </a>
        </li>

        <li class="mb-1 group active">
            <a href="{{ route('admin.show.modalselect') }}"
                class="flex items-center px-4 py-2 text-gray-300 rounded-md hover:bg-gray-950 hover:text-gray-100 ">
                <i class="mr-3 text-lg ri-folder-2-line"></i>
                <span class="text-sm">modalselect</span>
            </a>
        </li>

        <li class="mb-1 group">
            <a href="#"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <i class="mr-3 text-lg ri-flashlight-line"></i>
                <span class="text-sm">Orders</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-1 group active">
                    <a href="{{ route('admin.orders') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3
                                 @if (request()->routeIs('admin.orders') || request()->routeIs('admin.orderpage')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                                ">
                        <i class="mr-3 text-lg ri-shopping-bag-3-line"></i></i>
                        <span class="text-sm">Orders</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.show.ordermails') }}" class="text-gray-300 text-sm flex items-center
                     hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full
                      before:bg-gray-300 before:mr-3
                    @if (request()->routeIs('admin.show.ordermails') || 
                         request()->routeIs('admin.create.ordermails')
                         ) 
                         group-[.active]:bg-gray-800 group-[.active]:text-white group-
                         [.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                                                    ">
                        <i class="mr-3 text-lg ri-mail-settings-fill"></i></i>
                        <span class="text-sm">Orders E-mail</span>
                    </a>
                </li>
        
        
            </ul>
        </li>


        <li class="mb-1 group active">
            <a href="{{ route('admin.pages') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                 @if (request()->routeIs('admin.pages.update') ||
                         request()->routeIs('admin.pages') ||
                         request()->routeIs('admin.createpage')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                ">
                <i class="mr-3 text-lg ri-pages-fill"></i></i>
                <span class="text-sm">Pagina's</span>
            </a>
        </li>

        {{-- make also for menu --}}

        <li class="mb-1 group active">
            <a href="{{ route('admin.show.menus') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                 @if (request()->routeIs('admin.show.menus') || request()->routeIs('admin.menu.builder')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                ">
                <i class="mr-3 text-lg ri-menu-fill"></i>
                <span class="text-sm">Menu's</span>
            </a>
        </li>


        {{-- <li class="mb-1 group active">
            <a href="{{ route('admin.show.users') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                         @if (request()->routeIs('admin.createpage') || request()->routeIs('admin.pages') || request()->routeIs('admin.pages.update')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                        ">
                <i class="mr-3 text-lg ri-user-3-fill"></i></i>
                <span class="text-sm">Users</span>
            </a>
        </li> --}}

        <li class="mb-1 group active">
            <a href="{{ route('admin.show.customers') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                                 @if (request()->routeIs('admin.show.customers') || request()->routeIs('admin.edit.gegevens')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                                ">
                <i class="mr-3 text-lg ri-group-fill"></i></i>
                <span class="text-sm">Gebruikers</span>
            </a>
        </li>

        <li class="mb-1 group active">
            <a href="{{ route('admin.show.prodcuts') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                                         @if (request()->routeIs('admin.show.prodcuts') ||
                                                 request()->routeIs('admin.create.prodcuts') ||
                                                 request()->routeIs('admin.edit.prodcuts')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                                        ">
                <i class="mr-3 text-lg ri-shopping-cart-2-fill"></i></i>
                <span class="text-sm">Products</span>
            </a>
        </li>


        <li class="mb-1 group active">
            <a href="{{ route('admin.show.coupons') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                     @if (request()->routeIs('admin.show.coupons') ||
                             request()->routeIs('admin.create.coupons') ||
                             request()->routeIs('admin.edit.coupons')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                    ">
                <i class="mr-3 text-lg ri-coupon-2-fill"></i>
                <span class="text-sm">Coupons</span>
            </a>
        </li>
        {{-- for categories --}}
        <li class="mb-1 group active">
            <a href="{{ route('admin.show.categories') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                             @if (request()->routeIs('admin.show.categories') ||
                                     request()->routeIs('admin.create.categories') ||
                                     request()->routeIs('admin.edit.categories')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                            ">
                <i class="mr-3 text-lg ri-folder-3-fill"></i>
                <span class="text-sm">Categories</span>
            </a>
        </li>
      


        <li class="mb-1 group active">
            <a href="{{ route('admin.show.shipping') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                         @if (request()->routeIs('admin.show.shipping') || 
                         request()->routeIs('admin.create.shipping') || 
                         request()->routeIs('admin.edit.shipping')) 
                         group-[.active]:bg-gray-800 group-[.active]:text-white group-
                         [.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                        ">
                <i class="mr-3 text-lg ri-truck-fill"></i>
                <span class="text-sm">Shipping</span>
            </a>
        </li>

        <li class="mb-1 group active">
            <a href="{{ route('admin.paymentmethods') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                         @if (request()->routeIs('admin.paymentmethods') || 
                         request()->routeIs('admin.create.paymentmethods') || 
                         request()->routeIs('admin.edit.paymentmethods')) 
                         group-[.active]:bg-gray-800 group-[.active]:text-white group-
                         [.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                        ">
                <i class="mr-3 text-lg ri-secure-payment-fill"></i>
                <span class="text-sm">Payments Methods</span>
            </a>
        </li>


      


        {{-- <li class="mb-1 group">
            <a
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <i class="mr-3 text-lg ri-instance-line"></i>
                <span class="text-sm"></span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-4">
                    <a href=""
                        class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">
                        order</a>
                </li>

            </ul>
        </li> --}}
        {{-- <li class="mb-1 group">
            <a href="#"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <i class="mr-3 text-lg ri-flashlight-line"></i>
                <span class="text-sm">Orders</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                <li class="mb-1 group active">
                    <a href="{{ route('admin.orders') }}"
                        class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3
                         @if (request()->routeIs('admin.orders') || request()->routeIs('admin.orderpage')) group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                        ">
                        <i class="mr-3 text-lg ri-shopping-bag-3-line"></i></i>
                        <span class="text-sm">Orders</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href=""
                        class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">
                        order</a>
                </li>

                
            </ul>
        </li> --}}



        <li class="mb-1 group active">
            <a href="{{ route('admin.show.emailconfiguratie') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md
                        @if (request()->routeIs('admin.show.emailconfiguratie') || 
                         request()->routeIs('admin.create.emailconfiguratie') || 
                         request()->routeIs('admin.edit.emailconfiguratie')) 
                         group-[.active]:bg-gray-800 group-[.active]:text-white group-
                         [.selected]:bg-gray-950 group-[.selected]:text-gray-100 @endif
                        ">
                <i class="mr-3 text-lg ri-mail-settings-fill"></i>
                <span class="text-sm">SMTP</span>
            </a>
        </li>
        
        <li class="mb-1 group">
            <a href="{{ route('admin.Api_configration') }}"
                class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="mr-3 text-lg ri-settings-2-line"></i>
                <span class="text-sm">Api Configration</span>
            </a>
        </li>
    </ul>
</div>
<div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50 md:hidden sidebar-overlay"></div>
<!-- end: Sidebar -->
