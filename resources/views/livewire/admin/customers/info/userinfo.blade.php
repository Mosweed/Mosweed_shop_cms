<div >
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3 class="text-base font-semibold leading-6 fi-section-header-heading dark:text-white">
                        Edit User
                    </h3>
                </div>
                <a href="{{ route('admin.show.customers') }}" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        Back to List
                    </span>
                </a>
            </div>
        </header>

            <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                <div class="fi-fo-field-wrp">
                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Naam
                                    <sup class="font-medium text-danger-600 dark:text-danger-400">*</sup>
                                </span>
                            </label>
                        </div>
            
                        <div class="grid gap-y-2">
                            <input disabled="disabled"
                                class=" fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 "
                                value="{{ $user->name }}  ">
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                    <input type="email" value="{{ $user->email }}" wire:model="email" id="email" class="mt-1 block w-full rounded-md shadow-sm fi-input text-black">
                </div>
               



<div class="col-span-2 sm:col-span-1">
    <label for="newPassword" class="block text-sm font-medium text-gray-700 dark:text-white">New Password</label>
    <input type="password" wire:model.defer="newPassword" id="newPassword"
        class="mt-1 block w-full rounded-md shadow-sm fi-input">
    @error('newPassword') <span class="text-red-500">{{ $message }}</span> @enderror
</div>
<div class="col-span-2 sm:col-span-1">
    <label for="confirmPassword" class="block text-sm font-medium text-gray-700 dark:text-white">Confirm New
        Password</label>
    <input type="password" wire:model.defer="confirmPassword" id="confirmPassword"
        class="mt-1 block w-full rounded-md shadow-sm fi-input">
    @error('confirmPassword') <span class="text-red-500">{{ $message }}</span> @enderror
</div>






                <div class="col-span-2 sm:col-span-1">
                    <label for="resetPassword" class="block text-sm font-medium text-gray-700 dark:text-white">Reset Password</label>
                    <button wire:click="resetPassword" id="resetPassword" class="mt-1 block w-full rounded-md shadow-sm fi-button">
                        Reset User Password
                    </button>
                </div>





                <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                    <div data-field-wrapper="" class="fi-fo-field-wrp">
                        <div class="grid gap-y-2">
                            <div class="flex items-center justify-between gap-x-3">
                                <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                    <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                        Rol
                                        <sup class="font-medium text-danger-600 dark:text-danger-400">*</sup>
                                    </span>
                                </label>
                            </div>

                            <div class="grid gap-y-2">
                                <div style="--cols-default: 1" class="columns-[--cols-default] fi-fo-radio gap-3 flex flex-wrap">
                                    <div class="">
                                        <input id="status-Nieuw" name="status" type="radio" value="1" class="absolute opacity-0 pointer-events-none peer" wire:model='role' wire:change='Update_Status' />

                                        <label style="
                                          --c-400: var(--info-400);
                                          --c-500: var(--info-500);
                                          --c-600: var(--info-600);
                                        " class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-info fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20" for="status-Nieuw">
                                            <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z">
                                                </path>
                                            </svg>

                                            <span class="fi-btn-label"> Admin </span>
                                        </label>
                                    </div>

                                    <div class="">
                                        <input id="status-Inbehandeling" name="status" type="radio" value="2" class="absolute opacity-0 pointer-events-none peer" wire:model='role' wire:change='Update_Status' />

                                        <label style="
                                          --c-400: var(--warning-400);
                                          --c-500: var(--warning-500);
                                          --c-600: var(--warning-600);
                                        " class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-warning fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20" for="status-Inbehandeling">
                                            <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 0 1-9.201 2.466l-.312-.311h2.433a.75.75 0 0 0 0-1.5H3.989a.75.75 0 0 0-.75.75v4.242a.75.75 0 0 0 1.5 0v-2.43l.31.31a7 7 0 0 0 11.712-3.138.75.75 0 0 0-1.449-.39Zm1.23-3.723a.75.75 0 0 0 .219-.53V2.929a.75.75 0 0 0-1.5 0V5.36l-.31-.31A7 7 0 0 0 3.239 8.188a.75.75 0 1 0 1.448.389A5.5 5.5 0 0 1 13.89 6.11l.311.31h-2.432a.75.75 0 0 0 0 1.5h4.243a.75.75 0 0 0 .53-.219Z" clip-rule="evenodd"></path>
                                            </svg>

                                            <span class="fi-btn-label"> Beheerder </span>
                                        </label>
                                    </div>

                                    <div class="">
                                        <input id="status-verzonden" name="status" type="radio" value="3" class="absolute opacity-0 pointer-events-none peer" wire:model='role' wire:change='Update_Status' />

                                        <label style="
                                          --c-400: var(--success-400);
                                          --c-500: var(--success-500);
                                          --c-600: var(--success-600);
                                        " class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-success fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20" for="status-verzonden">
                                            <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z">
                                                </path>
                                                <path d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.61-.719.595-1.227a24.905 24.905 0 0 0-1.784-8.549A1.486 1.486 0 0 0 14.823 5H13.25ZM14.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z">
                                                </path>
                                            </svg>

                                            <span class="fi-btn-label"> Klant </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button wire:click="save" class="fi-btn fi-btn-primary">
                    Update User
                </button>
            </div>
    </div>




