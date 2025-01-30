<div
    class="min-h-screen pt-6 antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white pb-9">

    <x-swal />
    <div class="p-6 mx-6 bg-white fi-section-content dark:divide-white/10 dark:bg-gray-900">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header ">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                        Order #{{ $order->id }} details
                    </h3>
                </div>
            </div>
        </header>

        <div style="" class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
            <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                <div data-field-wrapper="" class="fi-fo-field-wrp">
                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Order Number
                                </span>
                            </label>
                        </div>

                        <div class="grid gap-y-2">
                            <div
                                class="flex overflow-hidden transition duration-75 rounded-lg shadow-sm fi-input-wrp ring-1 fi-disabled bg-gray-50 dark:bg-transparent ring-gray-950/10 dark:ring-white/10 fi-fo-text-input">
                                <div class="flex-1 min-w-0">
                                    <input
                                        class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                        disabled="disabled" maxlength="32" required="required" type="text"
                                        value="{{ $order->id }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                <div class="fi-fo-field-wrp">
                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Customer Name
                                    <sup class="font-medium text-danger-600 dark:text-danger-400">*</sup>
                                </span>
                            </label>
                        </div>

                        <div class="grid gap-y-2">
                            <input disabled="disabled"
                                class="flex transition duration-75 bg-white rounded-lg shadow-sm fi-input-wrp ring-1 dark:bg-white/5"
                                value="{{ $order->billing_firstname }} {{ $order->billing_lastname }} ">
                        </div>
                    </div>
                </div>
            </div>

            <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                <div class="fi-fo-field-wrp">
                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Total
                                    <sup class="font-medium text-danger-600 dark:text-danger-400">*</sup>
                                </span>
                            </label>
                        </div>

                        <div class="grid gap-y-2">
                            <input disabled="disabled"
                                class="flex transition duration-75 bg-white rounded-lg shadow-sm fi-input-wrp ring-1 dark:bg-white/5"
                                value=" {{ $order->total }}  ">
                        </div>
                    </div>
                </div>
            </div>



            <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                <div data-field-wrapper="" class="fi-fo-field-wrp">
                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Payment Status
                                    <sup class="font-medium text-danger-600 dark:text-danger-400">*</sup>
                                </span>
                            </label>
                        </div>

                        <div class="grid gap-y-2">
                            <div style="--cols-default: 1"
                                class="columns-[--cols-default] fi-fo-radio gap-3 flex flex-wrap">
                                <div class="">
                                    <input id="payment-Paid" name="payment-status" type="radio" value="Paid"
                                        class="absolute opacity-0 pointer-events-none peer" wire:model='payment'
                                        disabled />

                                    <label
                                        style=" --c-400: var(--success-400); --c-500: var(--success-500);  --c-600: var(--success-600);  "
                                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-success fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20"
                                        for="payment-Paid">
                                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M16.403 12.652a3 3 0 0 0 0-5.304 3 3 0 0 0-3.75-3.751 3 3 0 0 0-5.305 0 3 3 0 0 0-3.751 3.75 3 3 0 0 0 0 5.305 3 3 0 0 0 3.75 3.751 3 3 0 0 0 5.305 0 3 3 0 0 0 3.751-3.75Zm-2.546-4.46a.75.75 0 0 0-1.214-.883l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                                clip-rule="evenodd"></path>
                                        </svg>

                                        <span class="fi-btn-label"> Paid </span>
                                    </label>
                                </div>

                                <div class="">
                                    <input id="payment-Not_Paid" name="payment" type="radio" value="Not Paid"
                                        class="absolute opacity-0 pointer-events-none peer"
                                        wire:model='payment'disabled />

                                    <label
                                        style="  --c-400: var(--danger-400);  --c-500: var(--danger-500); --c-600: var(--danger-600);  "
                                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-danger fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20"
                                        for="payment-Not_Paid">
                                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                                                clip-rule="evenodd"></path>
                                        </svg>

                                        <span class="fi-btn-label"> Not Paid </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                <div data-field-wrapper="" class="fi-fo-field-wrp">
                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Status
                                    <sup class="font-medium text-danger-600 dark:text-danger-400">*</sup>
                                </span>
                            </label>
                        </div>

                        <div class="grid gap-y-2">
                            <div style="--cols-default: 1"
                                class="columns-[--cols-default] fi-fo-radio gap-3 flex flex-wrap">
                                <div class="">
                                    <input id="status-New" name="status" type="radio" value="New"
                                        class="absolute opacity-0 pointer-events-none peer" wire:model='status'
                                        wire:change='Update_Status' />

                                    <label
                                        style="
                      --c-400: var(--info-400);
                      --c-500: var(--info-500);
                      --c-600: var(--info-600);
                    "
                                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-info fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20"
                                        for="status-New">
                                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path
                                                d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z">
                                            </path>
                                        </svg>

                                        <span class="fi-btn-label"> New </span>
                                    </label>
                                </div>

                                <div class="">
                                    <input id="status-In_Progress" name="status" type="radio"
                                        value="In Progress" class="absolute opacity-0 pointer-events-none peer"
                                        wire:model='status' wire:change='Update_Status' />

                                    <label
                                        style="
                      --c-400: var(--warning-400);
                      --c-500: var(--warning-500);
                      --c-600: var(--warning-600);
                    "
                                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-warning fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20"
                                        for="status-In_Progress">
                                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M15.312 11.424a5.5 5.5 0 0 1-9.201 2.466l-.312-.311h2.433a.75.75 0 0 0 0-1.5H3.989a.75.75 0 0 0-.75.75v4.242a.75.75 0 0 0 1.5 0v-2.43l.31.31a7 7 0 0 0 11.712-3.138.75.75 0 0 0-1.449-.39Zm1.23-3.723a.75.75 0 0 0 .219-.53V2.929a.75.75 0 0 0-1.5 0V5.36l-.31-.31A7 7 0 0 0 3.239 8.188a.75.75 0 1 0 1.448.389A5.5 5.5 0 0 1 13.89 6.11l.311.31h-2.432a.75.75 0 0 0 0 1.5h4.243a.75.75 0 0 0 .53-.219Z"
                                                clip-rule="evenodd"></path>
                                        </svg>

                                        <span class="fi-btn-label"> in progress </span>
                                    </label>
                                </div>

                                <div class="">
                                    <input id="status-Sent" name="status" type="radio" value="Sent"
                                        class="absolute opacity-0 pointer-events-none peer" wire:model='status'
                                        wire:change='Update_Status' />

                                    <label
                                        style="
                      --c-400: var(--success-400);
                      --c-500: var(--success-500);
                      --c-600: var(--success-600);
                    "
                                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-success fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20"
                                        for="status-Sent">
                                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path
                                                d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z">
                                            </path>
                                            <path
                                                d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.61-.719.595-1.227a24.905 24.905 0 0 0-1.784-8.549A1.486 1.486 0 0 0 14.823 5H13.25ZM14.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z">
                                            </path>
                                        </svg>

                                        <span class="fi-btn-label">Sent</span>
                                    </label>
                                </div>

                                <div class="">
                                    <input id="status-Delivered" name="status" type="radio" value="Delivered"
                                        class="absolute opacity-0 pointer-events-none peer" wire:model='status'
                                        wire:change='Update_Status' />

                                    <label
                                        style="
                      --c-400: var(--success-400);
                      --c-500: var(--success-500);
                      --c-600: var(--success-600);
                    "
                                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-success fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20"
                                        for="status-Delivered">
                                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M16.403 12.652a3 3 0 0 0 0-5.304 3 3 0 0 0-3.75-3.751 3 3 0 0 0-5.305 0 3 3 0 0 0-3.751 3.75 3 3 0 0 0 0 5.305 3 3 0 0 0 3.75 3.751 3 3 0 0 0 5.305 0 3 3 0 0 0 3.751-3.75Zm-2.546-4.46a.75.75 0 0 0-1.214-.883l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                                clip-rule="evenodd"></path>
                                        </svg>

                                        <span class="fi-btn-label"> Delivered </span>
                                    </label>
                                </div>

                                <div class="">
                                    <input id="status-Canceled" name="status" type="radio" value="Canceled"
                                        class="absolute opacity-0 pointer-events-none peer" wire:model='status'
                                        wire:change='Update_Status' />

                                    <label
                                        style="
                      --c-400: var(--danger-400);
                      --c-500: var(--danger-500);
                      --c-600: var(--danger-600);
                    "
                                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg cursor-pointer fi-color-custom fi-btn-color-danger fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&amp;]:bg-custom-600 [input:checked+&amp;]:text-white [input:checked+&amp;]:ring-0 [input:checked+&amp;]:hover:bg-custom-500 dark:[input:checked+&amp;]:bg-custom-500 dark:[input:checked+&amp;]:hover:bg-custom-400 [input:checked:focus-visible+&amp;]:ring-custom-500/50 dark:[input:checked:focus-visible+&amp;]:ring-custom-400/50 [input:focus-visible+&amp;]:z-10 [input:focus-visible+&amp;]:ring-2 [input:focus-visible+&amp;]:ring-gray-950/10 dark:[input:focus-visible+&amp;]:ring-white/20"
                                        for="status-Canceled">
                                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-gray-400 dark:text-gray-500 [:checked+*>&amp;]:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                                                clip-rule="evenodd"></path>
                                        </svg>

                                        <span class="fi-btn-label"> Canceled </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div data-field-wrapper="" class="fi-fo-field-wrp">
                    <div class="grid gap-y-2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3" for="data.notes">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Notes
                                </span>
                            </label>
                        </div>

                        <div class="grid gap-y-2">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-markdown-editor max-w-full overflow-hidden font-mono text-base text-gray-950 dark:text-white sm:text-sm">
                                <div class="flex-1 min-w-0">
                                    <div>
                                        <div class="EasyMDEContainer" role="application">

                                            <textarea
                                                class="EasyMDE fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                maxlength="255" type="text" wire:model='order_note'></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="flex justify-center">


                <button style=";" wire:click="save"
                    class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg  fi-btn-color-gray fi-color-gray fi-size-sm fi-btn-size-sm gap-1 px-2.5 py-1.5 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 fi-ac-action fi-ac-btn-action"
                    type="button">
                    <span class="fi-btn-label">
                        Save
                    </span>
                </button>

            </div>

        </div>
    </div>

    <div class="p-6 mx-6 mt-6 bg-white fi-section-content dark:divide-white/10 dark:bg-gray-900 ">

        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                        Invoice address
                    </h3>
                </div>
            </div>
        </header>
        <div style=""
            class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">


            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr)); "
                        class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                        <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Company name
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->billing_bisiness_name }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-span-1 ">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                VAT number
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->billing_vat_number }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr)); "
                        class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                        <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                E-mail
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->billing_email }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-span-1 ">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Phone number
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->billing_phonenumber }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr)); "
                        class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                        <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Streetname
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->billing_address }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-span-1 ">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                House number
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->billing_housenumber }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr))"
                        class="grid grid-cols-[--cols-default] fi-fo-component-ctn gap-6">


                        <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                            <div>
                                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(3, minmax(0, 1fr)); "
                                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                    <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                                        <div data-field-wrapper="" class="fi-fo-field-wrp">
                                            <div class="grid gap-y-2">
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label
                                                        class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                                        <span
                                                            class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                            Postal code
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="grid gap-y-2">
                                                    <div
                                                        class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                                        <div class="flex-1 min-w-0">
                                                            <input
                                                                class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                                maxlength="255" type="text"
                                                                value="{{ $order->billing_zipcode }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                                        <div data-field-wrapper="" class="fi-fo-field-wrp">
                                            <div class="grid gap-y-2">
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label
                                                        class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                                        <span
                                                            class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                            Place
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="grid gap-y-2">
                                                    <div
                                                        class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                                        <div class="flex-1 min-w-0">
                                                            <input
                                                                class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                                maxlength="255" type="text"
                                                                value="{{ $order->billing_city }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                                        <div data-field-wrapper="" class="fi-fo-field-wrp">
                                            <div class="grid gap-y-2">
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label
                                                        class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                                        <span
                                                            class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                            Country/region
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="grid gap-y-2">
                                                    <div
                                                        class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                                        <div class="flex-1 min-w-0">
                                                            <input
                                                                class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                                maxlength="255" type="text"
                                                                value="{{ $order->billing_country }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>





    <div class="p-6 mx-6 mt-6 bg-white fi-section-content dark:divide-white/10 dark:bg-gray-900 ">


        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                        Shipping Address
                    </h3>
                </div>
            </div>
        </header>


        <div style=""
            class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">


            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr)); "
                        class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                        <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Company name
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->shipping_bisiness_name }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-span-1 ">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                VAT Number
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->shipping_vat_number }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr)); "
                        class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                        <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                E-mail
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->shipping_email }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-span-1 ">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Phonenumber
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->shipping_phonenumber }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(2, minmax(0, 1fr)); "
                        class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                        <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Streetname
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->shipping_address }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-span-1 ">
                            <div data-field-wrapper="" class="fi-fo-field-wrp">
                                <div class="grid gap-y-2">
                                    <div class="flex items-center justify-between gap-x-3">
                                        <label class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                            <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                Housenumber
                                            </span>
                                        </label>
                                    </div>

                                    <div class="grid gap-y-2">
                                        <div
                                            class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                            <div class="flex-1 min-w-0">
                                                <input
                                                    class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                    maxlength="255" type="text"
                                                    value="{{ $order->shipping_housenumber }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                <div>
                    <div style="--cols-default: repeat(1, minmax(0, 1fr))"
                        class="grid grid-cols-[--cols-default] fi-fo-component-ctn gap-6">


                        <div style="--col-span-default: 1 / -1" class="col-[--col-span-default]">
                            <div>
                                <div style="--cols-default: repeat(1, minmax(0, 1fr)); --cols-lg: repeat(3, minmax(0, 1fr)); "
                                    class="grid grid-cols-[--cols-default] lg:grid-cols-[--cols-lg] fi-fo-component-ctn gap-6">
                                    <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                                        <div data-field-wrapper="" class="fi-fo-field-wrp">
                                            <div class="grid gap-y-2">
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label
                                                        class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                                        <span
                                                            class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                            Postal code
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="grid gap-y-2">
                                                    <div
                                                        class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                                        <div class="flex-1 min-w-0">
                                                            <input
                                                                class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                                maxlength="255" type="text"
                                                                value="{{ $order->shipping_zipcode }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                                        <div data-field-wrapper="" class="fi-fo-field-wrp">
                                            <div class="grid gap-y-2">
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label
                                                        class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                                        <span
                                                            class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                            Place
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="grid gap-y-2">
                                                    <div
                                                        class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                                        <div class="flex-1 min-w-0">
                                                            <input
                                                                class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                                maxlength="255" type="text"
                                                                value="{{ $order->shipping_city }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="--col-span-default: span 1 / span 1" class="col-[--col-span-default]">
                                        <div data-field-wrapper="" class="fi-fo-field-wrp">
                                            <div class="grid gap-y-2">
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label
                                                        class="inline-flex items-center fi-fo-field-wrp-label gap-x-3">
                                                        <span
                                                            class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                                            Country/region
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="grid gap-y-2">
                                                    <div
                                                        class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input overflow-hidden">
                                                        <div class="flex-1 min-w-0">
                                                            <input
                                                                class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-3 pe-3"
                                                                maxlength="255" type="text"
                                                                value="{{ $order->shipping_country }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    @livewire('Admin\OrdersPages\Orderitems', ['id' => $order->id], key($order->id))



</div>
