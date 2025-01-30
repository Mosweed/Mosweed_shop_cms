<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3 class="text-base font-semibold leading-6 fi-section-header-heading dark:text-white">
                        API Configration
                    </h3>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-2 gap-6 py-8">
      

          
            <div class="col-span-2 sm:col-span-1">
                <label for="mollie_api_token" class="block text-sm font-medium text-gray-700 dark:text-white">
                   Mollie API Key  </label>
                <input type="text"  name="mollie_api_token" id="mollie_api_token"  wire:model="mollie_api_token"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                @error('mollie_api_token')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            
        </div>
        
        <div class="grid grid-cols-2 gap-6 py-8">
      

          
            <div class="col-span-2 sm:col-span-1">
                <label for="sendcloud_api_token" class="block text-sm font-medium text-gray-700 dark:text-white">
                    Sendcloud Public Key  </label>
                <input type="text"  name="sendcloud_api_token" id="sendcloud_api_token"  wire:model="sendcloud_api_token"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                @error('sendcloud_api_token')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            
        </div>

        <div class="grid grid-cols-2 gap-6 py-8">
      

          
            <div class="col-span-2 sm:col-span-1">
                <label for="sendcloud_api_secret" class="block text-sm font-medium text-gray-700 dark:text-white">
                    Sendcloud Secret key</label>
                <input type="text"  name="sendcloud_api_secret" id="sendcloud_api_secret"  wire:model="sendcloud_api_secret"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                @error('sendcloud_api_secret')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            
        </div>

        <div class="flex justify-center mt-6">
            <button class="fi-btn fi-btn-primary" wire:click='save'>
Save API Tokens            </button>
        </div>

        @if (session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
        @endif
    </div>
</div>