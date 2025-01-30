<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3 class="text-base font-semibold leading-6 fi-section-header-heading dark:text-white">
                        Add Shipping Method
                    </h3>
                </div>
                <a href="{{ route('admin.show.shipping') }}"
                    class="fi-btn dark:bg-gray-800 relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        Back to List
                    </span>
                </a>
            </div>
        </header>

        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2 sm:col-span-1">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Shipping Method
                    Name</label>
                <input type="text" id="name" wire:model="name"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-white">Image</label>
                <input type="file" id="image" wire:model="image"
                class="block w-full mt-1 rounded-md shadow-sm fi-input">
                @error('image')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-white">Type</label>
                <select id="type" wire:model.live="type"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400">
                    <option value="">Select Type</option>
                    <option value="Free">Free</option>
                    <option value="Fixed_rate">Fixed Rate</option>
                    <option value="Local_pickup">Local Pickup</option>
                </select>
                @error('type')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror


            </div>

            @if ($type === 'Free')
                <div class="col-span-2 sm:col-span-1">
                    <label for="min_order_amount" class="block text-sm font-medium text-gray-700 dark:text-white">Min
                        Order Amount</label>
                    <input type="text" id="min_order_amount" wire:model="min_order_amount"
                        class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                    @error('min_order_amount')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            @if ($type === 'Fixed_rate' || $type === 'Local_pickup')
                <div class="col-span-2 sm:col-span-1">
                    <label for="cost" class="block text-sm font-medium text-gray-700 dark:text-white">Cost</label>
                    <input type="text" id="cost" wire:model="cost"
                        class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                    @error('cost')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            @endif

            <div class="col-span-2 sm:col-span-1">
                <label for="enabled" class="block text-sm font-medium text-gray-700 dark:text-white">Enabled</label>
                <select id="enabled" wire:model="enabled"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                @error('enabled')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button wire:click="save" class="p-2 rounded-md dark:bg-gray-800 fi-btn fi-btn-primary">
                Add Shipping Method
            </button>
        </div>

        @if (session()->has('message'))
            <div class="mt-4 text-green-500">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
