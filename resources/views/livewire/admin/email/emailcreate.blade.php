<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3 class="text-base font-semibold leading-6 fi-section-header-heading dark:text-white">
                        Add Email Configuration
                    </h3>
                </div>
                <a href="{{ route('admin.show.emailconfiguratie') }}"
                    class="fi-btn dark:bg-gray-800 relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        Back to List
                    </span>
                </a>
            </div>
        </header>

        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2 sm:col-span-1">
                <label for="name_from" class="block text-sm font-medium text-gray-700 dark:text-white">Name From</label>
                <input type="text" id="name_from" wire:model="name_from"
                class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">                @error('name_from')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="email_from" class="block text-sm font-medium text-gray-700 dark:text-white">Email
                    From</label>
                <input type="email" id="email_from" wire:model="email_from"
                class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">                @error('email_from')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white">Password</label>
                <input type="password" id="password" wire:model="password"
                class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="host" class="block text-sm font-medium text-gray-700 dark:text-white">Host</label>
                <input type="text" id="host" wire:model="host"
                class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">                @error('host')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="port" class="block text-sm font-medium text-gray-700 dark:text-white">Port</label>
                <input type="number" id="port" wire:model="port"
                class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">                @error('port')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="encryption"
                    class="block text-sm font-medium text-gray-700 dark:text-white">Encryption</label>
                <select id="encryption" wire:model="encryption"
                class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                    <option value="">Select Encryption</option>
                    <option value="tls">TLS</option>
                    <option value="ssl">SSL</option>
                </select>
                @error('encryption')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button wire:click="save" class="p-2 rounded-md dark:bg-gray-800 fi-btn fi-btn-primary">
                Add Email Configuration
            </button>
        </div>

        @if (session()->has('message'))
            <div class="mt-4 text-green-500">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
