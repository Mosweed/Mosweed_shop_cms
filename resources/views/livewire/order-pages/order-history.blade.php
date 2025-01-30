{{-- <main class="px-4 my-10 sm:px-6 lg:px-8">
    <div class="container mx-auto overflow-hidden bg-white rounded-lg shadow">
        <div class="p-8">
            <h2 class="mb-4 text-lg font-semibold text-gray-800">Orders</h2>
            <!-- Orders List -->
            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-no-wrap table-auto">
                    <thead>
                        <tr class="bg-gray-200">

                            <th class="px-4 py-3 text-base text-gray-500">Bestelling Number</th>
                            <th class="px-4 py-3 text-base text-gray-500">Datum</th>
                            <th class="px-4 py-3 text-base text-gray-500">Totaal</th>
                            <th class="px-4 py-3 text-base text-gray-500">Status</th>
                            <th class="px-4 py-3 text-base text-gray-500"></th>


                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($orders as $order)
                            <tr>
                                <td class="px-4 py-2 border">
                                    <h4 class="text-lg font-bold text-[#333]">{{ $order->id }}</h4>
                                </td>

                                <td class="px-4 py-2 border">
                                    <h4 class="text-lg font-bold text-[#333]">{{ $order->date }}</h4>
                                </td>
                                <td class="px-4 py-2 border">
                                    <h4 class="text-lg font-bold text-[#333]">{{ $order->total }} </h4>
                                </td>
                                <td class="px-4 py-2 border">
                                    <h4 class="text-lg font-bold text-[#333]">{{ $order->status }} </h4>
                                </td>



                                <td class="px-4 py-2 border">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('order-details', $order->id) }}" class="px-4 py-2 font-semibold text-white bg-gray-800">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pdf', $order->id) }}"
                                            class="px-4 py-2 font-semibold text-white bg-gray-800">

                                            <i class=" fa-solid fa-file-invoice"></i>
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
</main> --}}


<main class="min-h-screen px-4 py-10 sm:px-6 lg:px-8 dark:bg-gray-900">
    <div class="container mx-auto overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800">
        <div class="p-8">
            <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Orders</h2>
            <!-- Orders List -->
            <div class="overflow-x-auto">
                <table class="w-full text-left whitespace-no-wrap table-auto">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 dark:text-white">

                            <th class="px-4 py-3 text-base text-gray-500 dark:text-white">Order Number</th>
                            <th class="px-4 py-3 text-base text-gray-500 dark:text-white">Date</th>
                            <th class="px-4 py-3 text-base text-gray-500 dark:text-white">Total</th>
                            <th class="px-4 py-3 text-base text-gray-500 dark:text-white">Status</th>
                            <th class="px-4 py-3 text-base text-gray-500 dark:text-white"></th>


                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($orders as $order)
                            <tr class="dark:bg-gray-700">
                                <td class="px-4 py-2 border">
                                    <h4 class="text-lg dark:text-white font-bold text-[#333]">{{ $order->id }}</h4>
                                </td>
                                </td>

                                <td class="px-4 py-2 border">
                                    <h4 class="text-lg dark:text-white font-bold text-[#333]">{{ $order->date }}</h4>
                                </td>
                                <td class="px-4 py-2 border">
                                    <h4 class="text-lg dark:text-white font-bold text-[#333]">{{ $order->total }} </h4>
                                </td>
                                <td class="px-4 py-2 border">
                                    <h4 class="text-lg dark:text-white font-bold text-[#333]">{{ $order->status }} </h4>
                                </td>



                                <td class="px-4 py-2 border">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('order-details', $order->id) }}"
                                            class="px-4 py-2 font-semibold text-white bg-gray-800">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('pdf', $order->id) }}"
                                            class="px-4 py-2 font-semibold text-white bg-gray-800">

                                            <i class=" fa-solid fa-file-invoice"></i>
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
</main>
