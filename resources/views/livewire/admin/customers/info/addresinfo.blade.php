<div>

    <div class="p-5">
        <header class="flex flex-col gap-3 px-6 py-4 fi-section-header">
            <div class="flex items-center gap-3">
                <div class="grid flex-1 gap-y-1">
                    <h3
                        class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                        Adres Info
                    </h3>
                </div>
               
            </div>
        </header>


        <div
            class="overflow-hidden bg-white divide-y divide-gray-200 shadow-sm  fi-ta-ctn rounded-xl ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
            <div class="divide-y divide-gray-200 fi-ta-header-ctn dark:divide-white/10">

                <div class="flex items-center justify-between px-4 py-3 fi-ta-header-toolbar gap-x-4 sm:px-6">

                    <div class="flex items-center shrink-0 gap-x-4">



                        <div>


                            <div class="items-center gap-x-3 sm:flex">
                                <label>


                                    <div
                                        class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500">


                                    </div>
                                </label>


                            </div>

                        </div>

                    </div>

                    <div class="flex items-center ms-auto gap-x-4">

                        <div class="fi-ta-search-field">


                            <div
                                class="fi-input-wrp flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500">


                                <div class="flex-1 min-w-0">
                                    <input
                                        class="fi-input block w-full baddres-none py-1.5 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)] sm:text-sm sm:leading-6 bg-white/0 ps-0 pe-3"
                                        autocomplete="off" placeholder="Search" type="search" placeholder="Search..."
                                        wire:model.live="searchTerm">
                                </div>

                            </div>
                        </div>



                    </div>

                </div>
            </div>



            <div
                class="relative overflow-x-auto divide-y divide-gray-200 fi-ta-content dark:divide-white/10 dark:baddres-t-white/10">
                <table class="w-full divide-y divide-gray-200 table-auto fi-ta-table text-start dark:divide-white/5">
                    <thead class="divide-y divide-gray-200 dark:divide-white/5">
                        <tr class="bg-gray-50 dark:bg-white/5">
                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-number"
                                style=";">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Id
                                    </span>
                                </div>
                            </th>

                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-addres.name"
                                style=";">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Straat naam
                                    </span>
                                </div>
                            </th>

                           

                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-status"
                                style=";">
                                <span class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Huisnummer </span>
                                </span>
                            </th>



                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-total-price"
                                style=";">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Stad
                                    </span>
                                </div>
                            </th>

                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-total-price"
                                style=";">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span
                                        class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Postcode
                                    </span>
                                </div>
                            </th>

                            <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-table-header-cell-total-price"
                                style=";">
                                <div class="flex items-center justify-start w-full group gap-x-1 whitespace-nowrap">
                                    <span class="text-sm font-semibold fi-ta-header-cell-label text-gray-950 dark:text-white">
                                        Woonplaats
                                    </span>
                                </div>
                            </th>




                            <th class="w-1"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 whitespace-nowrap dark:divide-white/5">
                        @foreach ($addresses as $addres)
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
                                                            {{ $addres->id }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td
                                class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-addres.name">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max" style>
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                            style>
                                                            {{ $addres->address }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                          
                            <td
                                class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 fi-table-cell-addres.name">
                                <div class="fi-ta-col-wrp">
                                    <div class="flex justify-start w-full disabled:pointer-events-none text-start">
                                        <div class="grid w-full px-3 py-4 fi-ta-text gap-y-1">
                                            <div class="flex">
                                                <div class="flex max-w-max" style>
                                                    <div class="fi-ta-text-item inline-flex items-center gap-1.5">
                                                        <span
                                                            class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white"
                                                            style>
                                                            {{ $addres->housenumber }}
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
                                                            {{ $addres->city }}
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

                                                            {{ $addres->zipcode  }} </span>
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
                                                        <span class="text-sm leading-6 fi-ta-text-item-label text-gray-950 dark:text-white" style>
                            
                                                            {{ $addres->country }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>



                         
                                </div>
                            </td>
                        </tr>
                        @endforeach




                    </tbody>

                    <tfoot class="divide-y divide-gray-200 dark:divide-white/5">
                        <tr class="bg-gray-50 dark:bg-white/5">
                            <td class="px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 fi-ta-footer-cell"
                                colspan="7">
                                {{-- {{ $addresses->links('pagination::tailwind') }} --}}
                            </td>
                        </tr>
                    </tfoot>



                </table>

            </div>

        </div>
    </div>
</div>