<div class="mx-6 mt-5 bg-white  fi-section-content dark:divide-white/10 dark:bg-gray-900">
    <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
        <div class="flex items-center gap-3">
            <div class="grid flex-1 gap-y-1">
                <h3 class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                    Orderitems
                </h3>
            </div>
        </div>
    </header>

    <div
        class="overflow-hidden bg-white divide-y divide-gray-200 shadow-sm  fi-ta-ctn rounded-xl ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">


        <div
            class="relative overflow-x-auto divide-y divide-gray-200 fi-ta-content dark:divide-white/10 dark:border-t-white/10 ">
            <table class="w-full divide-y divide-gray-200 table-auto fi-ta-table text-start dark:divide-white/5">
                <thead class="divide-y divide-gray-200 dark:divide-white/5">
                    <tr class="bg-gray-50 dark:bg-white/5">
                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-number"
                            style=";">
                            <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                <span
                                    class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                    Orderitem ID
                                </span>
                            </div>
                        </th>

                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-customer.name"
                            style=";">
                            <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                <span
                                    class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                    Product name
                                </span>
                            </div>
                        </th>

                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-status"
                            style=";">
                            <span class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                <span
                                    class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                    Status
                                </span>
                            </span>
                        </th>

                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-status"
                            style=";">
                            <span class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                <span
                                    class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                    Product price
                                </span>
                            </span>
                        </th>



                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-total-price"
                            style=";">
                            <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                <span
                                    class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                    amount
                                </span>
                            </div>
                        </th>



                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-created-at"
                            style=";">
                            <span class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                <span
                                    class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                    Total
                                </span>
                            </span>
                        </th>

                        <th class="w-1"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                    @foreach ($order_items as $order_item)
                        <tr
                            class="fi-ta-row [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75 hover:bg-gray-50 dark:hover:bg-white/5">
                            <td class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-number"
                                wire:key="QBsSrdIO7MlisZRm5A63.table.record.10.column.number">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max" style>
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                            style>
                                                            {{ $order_item->id }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td
                                class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-customer.name">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max" style>
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                            style>
                                                            {{ $order_item->product->product_name }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td
                                class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-status">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex gap-1.5 flex-wrap">
                                                <div class="flex w-max" style>
                                                    <span
                                                        style="--c-50:var(--info-50);--c-400:var(--info-400);--c-600:var(--info-600);"
                                                        class="fi-badge flex items-center justify-center gap-x-1 rounded-md text-xs font-medium ring-1 ring-inset px-2 min-w-[theme(spacing.6)] py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-info">
                                                        <span class="grid">
                                                            <span class="truncate">
                                                                {{ $order_item->status }} </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-shipping-price">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max" style>
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                            style>
                                                            &euro; {{ $order_item->product_price }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-shipping-price">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max" style>
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                            style>
                                                            {{ $order_item->quantity }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td
                                class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-created-at">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max" style>
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                            style>
                                                            &euro; {{ $order_item->price }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- <td
                                class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-ta-actions-cell">
                                <div class="px-3 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-3 fi-ta-actions shrink-0">
                                        <div="{{ route('admin.orderpage', $order->id) }}"
                                            class="relative inline-flex items-center justify-center gap-1 outline-none fi-link group/link fi-size-sm fi-link-size-sm fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                            <svg style="--c-400:var(--primary-400);--c-600:var(--primary-600);"
                                                class="w-4 h-4 fi-link-icon text-custom-600 dark:text-custom-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
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
                                        </>


                                    </div>

                                    <div class="flex items-center justify-end gap-3 fi-ta-actions shrink-0">
                                        <a wire:click='deleteOrder({{ $order->id }})'
                                            class="relative inline-flex items-center justify-center gap-1 outline-none  btn fi-link group/link fi-size-sm fi-link-size-sm fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                            <svg style="--c-400:#dc2626;--c-600:#dc2626;"
                                                class="w-4 h-4 fi-link-icon text-custom-600 dark:text-custom-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="#dc2626" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z">
                                                </path>
                                            </svg>
                                            <span
                                                class="text-sm font-semibold group-hover/link:underline group-focus-visible/link:underline text-custom-600 dark:text-custom-400"
                                                style="color:#dc2626">
                                                verwijderen
                                            </span>
                                        </a>


                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach




                </tbody>

                <tfoot class="divide-y divide-gray-200 dark:divide-white/5">
                    <tr class="bg-gray-50 dark:bg-white/5">
                        <td class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-ta-footer-cell"
                            colspan="7">
                            {{-- {{ $order_items->links() }} --}}
                        </td>
                    </tr>
                </tfoot>



            </table>

        </div>

    </div>
</div>
