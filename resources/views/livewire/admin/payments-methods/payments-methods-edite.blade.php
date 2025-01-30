<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3 class="text-base font-semibold leading-6 fi-section-header-heading dark:text-white">
                        Edit Payment Method
                    </h3>
                </div>
                <a href="{{ route('admin.paymentmethods') }}"
                    class="fi-btn dark:bg-gray-800 relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        Back to List
                    </span>
                </a>
            </div>
        </header>

        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2 sm:col-span-1">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Payment Method
                    Name</label>
                <input type="text" id="description" wire:model="description"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="upload_image" class="block text-sm font-medium text-gray-700 dark:text-white">Image</label>
                <input type="file" id="upload_image" wire:model="upload_image" wire:change='update_upload_image' 
                
                accept="image/jpeg, image/png, image/gif, image/svg+xml"
                    class="block w-full mt-1 rounded-md shadow-sm fi-input">
                @if ($image)
                    <img src="{{ $image }}" alt="Current Image" class="mt-2" style="max-height: 150px;">
                @endif

            
                @error('upload_image')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-span-2 sm:col-span-1">
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-white">Status</label>
                <select id="status" wire:model.live="status"
                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400">
                    <option value="">Select status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror


            </div>
        
        </div>

        <div class="flex justify-end mt-6">
            <button wire:click="updatePaymentsmethod" class="fi-btn fi-btn-primary">
                Update Payment  Method
            </button>
        </div>

        @if (session()->has('message'))
            <div class="mt-4 text-green-500">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
