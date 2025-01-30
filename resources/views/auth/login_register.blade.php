<x-app-layout>


    <div class="min-h-screen p-4 dark:bg-gray-900 dark:text-white">

        <div class="max-w-md p-8 m-auto shadow-md mrounded-lg dark:bg-gray-800 dark:text-white">
                <h2 class="mb-4 text-2xl font-bold text-center">Winkelmand</h2>


                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="ml-4">
                            <a href="{{ route('checkout') }}" class="text-blue-600 hover:underline">Ga verder als gast</a>

                        </div>
                    </div>
                </div>

                <div id="loginForm" class="w-full px-6 py-4 mt-6 mb-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login
                    </h1>

                    <x-section-border />


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                                autofocus autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a  id="registerToggle" class="text-sm text-gray-600 underline rounded-md btn dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Registreren</a>

                            <x-button class="ms-4">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </div>

                <div id="registerForm" class="hidden w-full px-6 py-4 mt-6 mb-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
                    <x-validation-errors class="mb-4" />
                    <x-validation-errors class="mb-4" />

                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Register
                    </h1>

                    <x-section-border />
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                                autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                                autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>



                        <div class="flex items-center justify-end mt-4">
                            <a id="loginToggle" class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="ms-4">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>
        </div>
               
            <script>
                // JavaScript code to toggle between login and registration forms
                document.addEventListener("DOMContentLoaded", function() {
                    const loginForm = document.getElementById("loginForm");
                    const registerForm = document.getElementById("registerForm");
                    const loginToggle = document.getElementById("loginToggle");
                    const registerToggle = document.getElementById("registerToggle");

                    loginToggle.addEventListener("click", function() {
                        loginForm.style.display = "block";
                        registerForm.style.display = "none";
                    });


                    registerToggle.addEventListener("click", function() {
                        loginForm.style.display = "none";
                        registerForm.style.display = "block";
                    });
                });
            </script>
</x-app-layout>
