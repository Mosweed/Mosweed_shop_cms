


<div class="min-h-full">
    <nav class="text-black bg-white dark:bg-gray-800 dark:text-white">
        <div class="h-20 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center mt-5">
                    <div class="flex-shrink-0">
                        <img class="w-12 h-16 " src="{{ asset('storage/images/logo1.png') }}"
                            alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-baseline ml-10 space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="/"
                                class="px-3 py-2 text-sm font-medium text-black bg-white dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white">producten</a>
                        @auth
                        <a href="/orders"
                        class="px-3 py-2 text-sm font-medium text-black bg-white dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white">Orders</a>



                        @if (Auth::user()->roleName == 'Admin')
                            <a href="admin/dashboard"
                                class="px-3 py-2 text-sm font-medium text-black bg-white dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white">Dashboard</a>

                        @endif
                        @endauth




                        </div>
                    </div>
                </div>


                @auth
                    <div class="hidden md:block">
                        <div class="flex items-center ml-4 md:ml-6 ">

                            <div class="pr-5">

                                <livewire:shop-cart.cartcounter>

                            </div>


                            <div class="relative ml-3">
                                <div>
                                    <button type="button"
                                        class="relative flex items-center max-w-xs text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="true" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }} ">
                                    </button>
                                </div>


                                <div class="absolute right-0 z-10 hidden w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    id="user-menu" role="menu" aria-orientation="vertical"
                                    aria-labelledby="user-menu-button" aria-expanded="true" tabindex="-1">

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        <div class="ml-2 ">
                                            <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                                                x-on:click="darkMode = !darkMode"
                                                class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                                role="switch" aria-checked="false">
                                                <span class="sr-only">Dark mode toggle</span>
                                                <span
                                                    x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                                                    class="relative inline-block w-5 h-5 transition duration-200 ease-in-out transform rounded-full shadow pointer-events-none ring-0">
                                                    <span
                                                        x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' :
                                                            'opacity-100 ease-in duration-200'"
                                                        class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                                        aria-hidden="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-3 h-3 text-gray-400" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                            <path
                                                                d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                                        </svg>
                                                    </span>
                                                    <span
                                                        x-bind:class="darkMode ? 'opacity-100 ease-in duration-200' :
                                                            'opacity-0 ease-out duration-100'"
                                                        class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                                        aria-hidden="true">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                                    @livewire('logout')


                                </div>
                            </div>
                        </div>
                    </div>
                @endauth



                <div class="flex -mr-2 md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                        class="relative inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                @guest

                    <div class="justify-end hidden md:block ">

                        <livewire:shop-cart.cartcounter>
                    </div>
                    <div class="justify-between hidden md:block ">

                        <a href="{{ route('login') }}"
                            class="px-3 py-2 text-sm font-medium text-black bg-white rounded-md 0 dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white">Log
                            in</a>
                        <a href="{{ route('register') }}"
                            class="px-3 py-2 text-sm font-medium text-black bg-white rounded-md dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white">Register</a>

                        <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-900'"
                            x-on:click="darkMode = !darkMode"
                            class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer p w-11 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            role="switch" aria-checked="false">
                            <span class="sr-only">Dark mode toggle</span>
                            <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                                class="relative inline-block w-5 h-5 transition duration-200 ease-in-out transform rounded-full shadow pointer-events-none ring-0">
                                <span
                                    x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                                    class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                    aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                    </svg>
                                </span>
                                <span
                                    x-bind:class="darkMode ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                                    class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                    aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        </button>


                    </div>

                @endguest
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">

                <a href="/"
                    class="block px-3 py-2 text-base font-medium text-black bg-white rounded-md dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"
                    aria-current="page">producten</a>

                    @auth

                    <a href="/orders"
                    class="block px-3 py-2 text-base font-medium text-black bg-white rounded-md dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"
                    aria-current="page">Orders</a>
                    @endauth





                <livewire:shop-cart.cartcounter>


                    @guest

                        <a href="{{ route('login') }}"
                            class="block px-3 py-2 text-base font-medium text-black bg-white rounded-md dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white">Log
                            in</a>

                        <a href="{{ route('register') }}"
                            class="block px-3 py-2 text-base font-medium text-black bg-white rounded-md dark:bg-gray-800 dark:text-white hover:bg-gray-700 hover:text-white">Register</a>


                        <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-700'"
                            x-on:click="darkMode = !darkMode"
                            class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            role="switch" aria-checked="false">
                            <span class="sr-only">Dark mode toggle</span>
                            <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                                class="relative inline-block w-5 h-5 transition duration-200 ease-in-out transform rounded-full shadow pointer-events-none ring-0">
                                <span
                                    x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                                    class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                    aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                    </svg>
                                </span>
                                <span
                                    x-bind:class="darkMode ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                                    class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                    aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        </button>


                </div>
            @endguest
        </div>


        <div class="pt-4 pb-3 border-t border-gray-700">

            @auth
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }} ">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                    <button type="button" aria-labelledby="mobile-menu-button" aria-expanded="true" tabindex="-1"
                        class="relative flex-shrink-0 p-1 ml-auto text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>

                    </button>
                </div>


                <div class="hidden px-2 mt-3 space-y-1 " id="mobile-menu-buttens" aria-labelledby="mobile-menu-button">


                    @guest
                        <div class="justify-between hidden md:block ">
                            <a href="{{ route('login') }}"
                                class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Log
                                in</a>
                            <a href="{{ route('register') }}"
                                class="px-3 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Register</a>

                            <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                                x-on:click="darkMode = !darkMode"
                                class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer p w-11 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                role="switch" aria-checked="false">
                                <span class="sr-only">Dark mode toggle</span>
                                <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                                    class="relative inline-block w-5 h-5 transition duration-200 ease-in-out transform rounded-full shadow pointer-events-none ring-0">
                                    <span
                                        x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' :
                                            'opacity-100 ease-in duration-200'"
                                        class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                        aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                        </svg>
                                    </span>
                                    <span
                                        x-bind:class="darkMode ? 'opacity-100 ease-in duration-200' :
                                            'opacity-0 ease-out duration-100'"
                                        class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                        aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </span>
                            </button>


                        </div>

                    @endguest

                    <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                        x-on:click="darkMode = !darkMode"
                        class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        role="switch" aria-checked="false">
                        <span class="sr-only">Dark mode toggle</span>
                        <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                            class="relative inline-block w-5 h-5 transition duration-200 ease-in-out transform rounded-full shadow pointer-events-none ring-0">
                            <span
                                x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                                class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-gray-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                </svg>
                            </span>
                            <span
                                x-bind:class="darkMode ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                                class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    </button>
                    <a href="#"
                        class="block px-3 py-2 text-base font-medium text-gray-400 rounded-md hover:bg-gray-700 hover:text-white">Your
                        Profile</a>

                    @livewire('logout')
                </div>
            @endauth
        </div>
    </nav>
</div>

