<div
    >
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3 class="text-base font-semibold leading-6 fi-section-header-heading dark:text-white">
                        Edit customer
                    </h3>
                </div>
                <a href="{{ route('admin.show.customers') }}"
                    class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        Back to List
                    </span>
                </a>
            </div>
        </header>

        <!-- First Name Field -->
        <div class="col-span-2 sm:col-span-1">
            <label for="firstname" class="block text-sm font-medium text-gray-700 dark:text-white ">First Name</label>
            <input type="text"  wire:model="firstname" id="firstname"
                class="mt-1 block w-full rounded-md shadow-sm fi-input text-gray-700 ">
        </div>

        <!-- Last Name Field -->
        <div class="col-span-2 sm:col-span-1">
            <label for="lastname" class="block text-sm font-medium text-gray-700 dark:text-white">Last Name</label>
            <input type="text" wire:model="lastname" id="lastname"
                class="mt-1 block w-full rounded-md shadow-sm fi-input text-gray-700 ">
        </div>

        <!-- Email Field -->
        <div class="col-span-2 sm:col-span-1">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
            <input type="email" wire:model="email" id="email"
                class="mt-1 block w-full rounded-md shadow-sm fi-input text-gray-700">
        </div>

        <!-- Telephone Number Field -->
        <div class="col-span-2 sm:col-span-1">
            <label for="phonenumber" class="block text-sm font-medium text-gray-700 dark:text-white">Telephone
                Number</label>
            <input type="text" wire:model="phonenumber" id="phonenumber"
                class="mt-1 block w-full rounded-md shadow-sm fi-input text-gray-700">
        </div>

        <!-- Update Button -->
        <div class="mt-6 flex justify-end">
            <button wire:click="saveCustomer" class="fi-btn fi-btn-primary">
                Update customer
            </button>
        </div>
    </div>
</div>