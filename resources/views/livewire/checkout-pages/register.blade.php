<div class="font-[sans-serif] bg-gray-100 py-10 dark:bg-gray-900 ">
    <div class="max-w-md p-8 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
    <h2 class="mb-6 text-2xl font-bold text-center text-gray-900 dark:text-gray-100">Persoonlijke gegevens</h2>

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md">
            <div class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md dark:bg-gray-800">
                <div class="mb-4">
                    <label for="firstname" class="block mb-2 font-bold text-gray-700 dark:text-gray-400">Voornaam *</label>
                    <input type="text" id="firstname"
                        class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='first_name'>
                    <span class="text-xs italic text-red-500">
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-4">
                    <label for="lastname" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Achternaam *</label>
                    <input type="text" id="lastname"
                        class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='last_name'>
                    <span class="text-xs italic text-red-500">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @auth
                    @if (auth()->user()->castumer == null)
                        <div class="mb-4">
                            <label for="email" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Email *</label>
                            <input type="email" id="email"
                                class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                wire:model='email' />
                            <span class="text-xs italic text-red-500">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Telefoon *</label>
                            <input type="tel" id="phone"
                                class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                wire:model='phone' />
                            <span class="text-xs italic text-red-500">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    @endif
                @endauth

                @guest
                    @if ($is_a_customer == false)
                        <div class="mb-4">
                            <label for="email" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Email *</label>
                            <input type="email" id="email"
                                class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                wire:model='email' />
                            <span class="text-xs italic text-red-500">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Telefoon *</label>
                            <input type="tel" id="phone"
                                class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                                wire:model='phone' />
                            <span class="text-xs italic text-red-500">
                                @error('phone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    @endif
                @endguest

                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300" for="businessName">
                        Bedrijfsnaam </label>
                    <input
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='bisiness_name' id="bisiness_name" type="text">
                    <span class="text-xs italic text-red-500">
                        @error('bisiness_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-4" id="vatNumberField">
                    <label class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300" for="vatNumber">
                        BTW nummer
                    </label>
                    <input
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='vat_number' type="text">
                    <span class="text-xs italic text-red-500">
                        @error('vat_number')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-4">
                    <label for="zipcode" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Postcode *</label>
                    <input type="text" id="zipcode"
                        class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='zip'>
                    <span class="text-xs italic text-red-500">
                        @error('zip')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-4">
                    <label for="streetname" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Straatnaam *</label>
                    <input type="text" id="streetname"
                        class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='address'>
                    <span class="text-xs italic text-red-500">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-4">
                    <label for="housenumber" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Huisnummer *</label>
                    <input type="text" id="housenumber"
                        class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='house_number'>
                    <span class="text-xs italic text-red-500">
                        @error('house_number')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-4">
                    <label for="city" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Plaats *</label>
                    <input type="text" id="city"
                        class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='city'>
                    <span class="text-xs italic text-red-500">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-4">
                    <label for="country" class="block mb-2 font-bold text-gray-700 dark:text-gray-300">Land *</label>
                    <input type="text" id="country"
                        class="w-full px-3 py-2 leading-tight border rounded-lg appearance-none focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                        wire:model='country'>
                    <span class="text-xs italic text-red-500">
                        @error('country')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-6 text-center">
                    <button wire:click='save' class="px-4 py-2 font-bold text-white bg-blue-700 rounded-full"
                        type="button">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@script
    <script>
        window.addEventListener('swal', function(e) {
            Swal.fire({
                title: 'You had previously placed an order with this email address, would you like to create an account?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                icon: 'warning',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                },
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'We have all your details, you will receive an email to create a password',
                        '', 'info'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('CreateUser');
                        }
                    });
                } else if (result.isDenied) {
                    Livewire.dispatch('Continue_as_guest');
                }
            });
        });

        window.addEventListener('swal_login', function(e) {
            Swal.fire({
                title: 'You are a user you can log in otherwise use another email to log in click yes to continue',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
                icon: 'warning',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                },
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('Inloggen');
                } else if (result.isDenied) {}
            });
        });

        window.addEventListener('swal_success', function(e) {
            Swal.fire({
                title: 'Your data has been saved ',
                text: 'You will receive an email to create a password',
                icon: 'success',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('Inloggen');
                }
            });
        });

        window.addEventListener('swal_error', function(e) {
            Swal.fire({
                title: 'something went wrong please try again',
                icon: 'error',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                },
                allowOutsideClick: false
            });
        });
    </script>
@endscript
