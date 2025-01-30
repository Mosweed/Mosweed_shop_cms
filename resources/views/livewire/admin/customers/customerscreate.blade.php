<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading  dark:text-white">
                        Create Customer
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



            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-2 sm:col-span-1">
                    <label for="firstname" class="block text-sm font-medium text-gray-700 dark:text-white">First
                        Name</label>
                    <input type="text" name="firstname" id="firstname" wire:model="firstname"
                        class="mt-1 block w-full rounded-md shadow-sm fi-input" >
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="lastname" class="block text-sm font-medium text-gray-700 dark:text-white">Last
                        Name</label>
                    <input type="text" name="lastname" id="lastname" wire:model="lastname"
                        class="mt-1 block w-full rounded-md shadow-sm fi-input" >
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md shadow-sm fi-input" wire:model="email"
                        >
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="phonenumber" class="block text-sm font-medium text-gray-700 dark:text-white">Phone
                        Number</label>
                    <input type="text" name="phonenumber" id="phonenumber"
                        class="mt-1 block w-full rounded-md shadow-sm fi-input"  wire:model="phonenumber">
                </div>
                {{-- put the role which contains Admin , beheerder en klant --}}
                <div class="col-span-2 sm:col-span-1">
                    <label for="role" class="block text-sm font-medium text-gray-700 dark:text-white">Role</label>
                    <select id="role" name="role" wire:model="role"  class="mt-1 block 
                        w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-custom-500 focus:border-custom-500 sm:text-sm rounded-md shadow-sm">
                        <option value="">Select Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Beheerder</option>
                        <option value="3">Klant</option>
                    </select>
                    </label>
                </div>


            </div>

            <div class="mt-6 flex justify-end">
                <button wire:click="savenewCustomer" class="fi-btn fi-btn-primary">
                    Create Customer
                </button>
            </div>
    </div>
</div>