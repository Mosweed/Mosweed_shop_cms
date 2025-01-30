<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">
    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                        Orders Emails
                    </h3>
                </div>
                <a href="{{ route('admin.create.ordermails') }}"
                    style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
                    class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
                    <span class="fi-btn-label">
                        Add Order Email
                    </span>
                </a>
            </div>
        </header>

        <div
            class="overflow-hidden bg-white divide-y divide-gray-200 shadow-sm fi-ta-ctn rounded-xl ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
            <div class="divide-y divide-gray-200 fi-ta-header-ctn dark:divide-white/10">
                <div class="flex items-center justify-between px-4 py-3 fi-ta-header-toolbar gap-x-4 sm:px-6">
                    <div class="flex items-center shrink-0 gap-x-4">
                        <div class="fi-ta-search-field">
                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 focus-within:ring-primary-600 dark:focus-within:ring-primary-500">
                                <div class="flex-1 min-w-0">
                                    <input
                                        class="fi-input block w-full border-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 sm:text-sm sm:leading-6 bg-white/0 ps-0 pe-3"
                                        autocomplete="off" placeholder="Search" type="search"
                                        wire:model.live="searchTerm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto divide-y divide-gray-200 fi-ta-content dark:divide-white/10">
                <table class="w-full divide-y divide-gray-200 table-auto fi-ta-table text-start dark:divide-white/5">
                    <thead class="divide-y divide-gray-200 dark:divide-white/5">
                        <tr class="bg-gray-50 dark:bg-white/5">
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-number">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Id
                                    </span>
                                </div>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-category.name">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Name
                                    </span>
                                </div>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-email">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Email
                                    </span>
                                </div>
                            </th>
                            <th
                                class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-actions">
                                <span class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Actions
                                    </span>
                                </span>
                            </th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                        @foreach ($ordersEmails as $orderEmail)
                        <tr class="fi-ta-row hover:bg-gray-50 dark:hover:bg-white/5">
                            <td
                                class="p-0 fi-ta-cell first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-number">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max">
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white">
                                                            {{ $orderEmail->id }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-category.name">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max">
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white">
                                                            {{ $orderEmail->name }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-email">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max">
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white">
                                                            {{ $orderEmail->email }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="fi-ta-actions-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                                <div
                                    class="fi-ta-actions flex shrink-0 items-center gap-3 flex-wrap sm:flex-nowrap md:ps-3 ps-3 pe-4 sm:pe-6">
                                    <a wire:click="deleteOrderEmail({{ $orderEmail->id }})"
                                        class="relative inline-flex items-center justify-center gap-1 outline-none fi-link group/link fi-size-sm fi-link-size-sm cursor-pointer fi-color-custom fi-color-primary fi-ac-action fi-ac-link-action">
                                        <svg style="--c-400:#dc2626;--c-600:#dc2626;"
                                            class="w-4 h-4 fi-link-icon text-custom-600 dark:text-custom-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#dc2626"
                                            aria-hidden="true" data-slot="icon">
                                            <path
                                                d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-sm font-semibold group-hover/link:underline group-focus-visible/link:underline text-custom-600 dark:text-custom-400"
                                            style="color:#dc2626">Delete</span>
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