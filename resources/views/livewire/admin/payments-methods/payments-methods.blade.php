<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">

    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                        Payments Methods
                    </h3>
                </div>



                @if ($mollie_api_token != null)
                     <a wire:click="getPaymentsMethods"
                     style="--c-400:var(--success-400);--c-500:var(--success-500);--c-600:var(--success-600);"

                    class=" fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        Get mollie payments methods
                    </span>
                </a>
                @endif
                
                <a href="{{ route('admin.create.paymentmethods') }}"
                    style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
                    class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        New Payments Method
                    </span>
                </a>
            </div>
        </header>


        <div
            class="overflow-hidden bg-white divide-y divide-gray-200 shadow-sm fi-ta-ctn rounded-xl ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
       
            <div
                class="relative overflow-x-auto divide-y divide-gray-200 fi-ta-content dark:divide-white/10 dark:border-t-white/10">
                <table class="w-full divide-y divide-gray-200 table-auto fi-ta-table text-start dark:divide-white/5">
                    <thead class="divide-y divide-gray-200 dark:divide-white/5">
                        <tr class="bg-gray-50 dark:bg-white/5">
                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-number"
                                style=";">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Payments Methods Id
                                    </span>
                                </div>
                            </th>

                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-customer.name"
                                style=";">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Description
                                    </span>
                                </div>
                            </th>

                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-customer.name"
                            style=";">
                            <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                <span
                                    class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                    status
                                </span>
                            </div>
                        </th>
                            



                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-total-price"
                                style=";">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">

                                    </span>
                                </div>
                            </th>



                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-created-at"
                                style=";">
                                <span class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">

                                    </span>
                                </span>
                            </th>
                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-created-at"
                                style=";">
                                <span class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">

                                    </span>
                                </span>
                            </th>
                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-created-at"
                                style=";">
                                <span class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">

                                    </span>
                                </span>
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                        @foreach ($PaymentsMethods as $PaymentsMethod)
                            <tr
                                class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5">
                                <td class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-number"
                                    wire:key="QBsSrdIO7MlisZRm5A63.table.record.10.column.number">
                                    <div class="fi-ta-col-wrp">
                                        <a href
                                            class="flex justify-start w-full disabled:pointer-events-none text-start">
                                            <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                                <div class="flex">
                                                    <div class="flex max-w-max" style>
                                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                            <span
                                                                class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                                style>
                                                                {{ $PaymentsMethod->Payments_methods_id }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </td>

                                <td
                                    class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-customer.name">
                                    <div class="fi-ta-col-wrp">
                                        <a href
                                            class="flex justify-start w-full disabled:pointer-events-none text-start">
                                            <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                                <div class="flex">
                                                    <div class="flex max-w-max" style>
                                                        <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                            <span
                                                                class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                                style>
                                                                {{ $PaymentsMethod->description }} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </td>

                                
                                <td
                                class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-customer.name">
                                <div class="fi-ta-col-wrp">
                                    <a href
                                        class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max" style>
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                            style>
                                                            {{ $PaymentsMethod->status }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </td>



                            <td
                                class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                                <div
                                    class="flex flex-wrap items-center gap-3 fi-ta-actions shrink-0 sm:flex-nowrap md:ps-3 ps-3 pe-4 sm:pe-6">
                                    <a href="{{ route('admin.edit.paymentmethods', $PaymentsMethod->Payments_methods_id)}}"
                                        class="relative inline-flex items-center justify-center gap-1 outline-none cursor-pointer fi-link group/link fi-size-sm fi-link-size-sm fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">

                                        <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                            class="w-4 h-4 fi-link-icon text-custom-600 dark:text-custom-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true" data-slot="icon">
                                            <path
                                                d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                            </path>
                                            <path
                                                d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                            </path>
                                        </svg>

                                        <span
                                            class="text-sm font-semibold group-hover/link:underline group-focus-visible/link:underline text-custom-600 dark:text-custom-400"
                                            style="--c-400:var(--primary-400);--c-600:var(--primary-600);">
                                            Edit
                                        </span>
                                    </a>


                                    <a wire:click='deletePaymentsmethod("{{$PaymentsMethod->Payments_methods_id}}")' class="relative inline-flex items-center justify-center gap-1 outline-none cursor-pointer fi-link group/link fi-size-sm fi-link-size-sm fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action"> <svg
                                            style="--c-400:#dc2626;--c-600:#dc2626;"
                                            class="w-4 h-4 fi-link-icon text-custom-600 dark:text-custom-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#dc2626"
                                            aria-hidden="true" data-slot="icon">
                                            <path
                                                d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-sm font-semibold group-hover/link:underline group-focus-visible/link:underline text-custom-600 dark:text-custom-400"
                                            style="color:#dc2626">
                                            Delete
                                        </span>
                                    </a>
                                </div>
                            </td>
                            </tr>
                        @endforeach


                    </tbody>

                
                </table>

            </div>

        </div>
    </div>
</div>
