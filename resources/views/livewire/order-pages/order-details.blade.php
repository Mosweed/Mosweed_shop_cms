{{-- <div class="container mx-auto overflow-hidden bg-white rounded-lg shadow">
    <div class="p-8">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-800">Order Details</h2>
        </div>
        <div class="mt-6">

            @foreach ($order_items as $order_item )
            <div
            class="flex flex-col justify-between pb-6 border-b border-gray-200 md:flex-row md:items-center">
            <div class="flex items-center">
                <img class="object-cover w-24 h-24 mr-4 rounded-md" src="{{ $order_item->product->image }}"
                    alt="{{ $order_item->product->product_name }}">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">{{ $order_item->product->product_name }}</h3>
                    <p class="text-gray-600">
                        {{ $order_item->product->description }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col mt-4 md:mt-0">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Prijs:</span>
                    <span class="font-semibold text-gray-900">&euro; {{ $order_item->product_price }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Aantal:</span>
                    <span class="font-semibold text-gray-900">{{ $order_item->quantity }}</span>
                </div>

                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Totale Prijs :</span>
                    <span class="font-semibold text-gray-900">&euro; {{ $order_item->price }}</span>
                </div>
            </div>
        </div>
            @endforeach


        </div>
        <div class="flex justify-between pt-6 border-t border-gray-200">
            <span class="text-lg text-gray-800">Total:</span>
            <span class="text-lg font-semibold text-gray-900">&euro; {{ $order->total }}</span>
        </div>

        <div class="mt-6">
            <h3 class="mb-4 text-lg font-semibold text-gray-800">Factuuradres</h3>
            <div class="flex flex-col justify-between md:flex-row">
                <div class="w-full md:w-1/2">
                    <p class="text-gray-600"><span class="font-semibold">Name:</span>{{ $order->billing_firstname }} {{ $order->billing_lastname }}</p>
                    <p class="text-gray-600"><span class="font-semibold">Address:</span> {{ $order->billing_address }} {{ $order->billing_housenumber }} ,
                        {{ $order->billing_zipcode }}  {{ $order->billing_city }},
                        {{ $order->billing_country }}</p>
                </div>
                <div class="w-full mt-4 md:w-1/2 md:mt-0">
                    <p class="text-gray-600"><span class="font-semibold">Email:</span> {{ $order->billing_email }}</p>
                    <p class="text-gray-600"><span class="font-semibold">Phone:</span> {{ $order->billing_phonenumber }}</p>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <h3 class="mb-4 text-lg font-semibold text-gray-800">Verzendadres</h3>
            <div class="flex flex-col justify-between md:flex-row">
                <div class="w-full md:w-1/2">
                    <p class="text-gray-600"><span class="font-semibold">Name:</span>{{ $order->shipping_firstname }} {{ $order->shipping_lastname }}</p>
                    <p class="text-gray-600"><span class="font-semibold">Address:</span> {{ $order->shipping_address }} {{ $order->shipping_housenumber }} ,
                        {{ $order->shipping_zipcode }}  {{ $order->shipping_city }},
                        {{ $order->shipping_country }}</p>
                </div>
                <div class="w-full mt-4 md:w-1/2 md:mt-0">
                    <p class="text-gray-600"><span class="font-semibold">Email:</span> {{ $order->shipping_email }}</p>
                    <p class="text-gray-600"><span class="font-semibold">Phone:</span> {{ $order->shipping_phonenumber }}</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="font-[sans-serif] min-h-screen bg-white py-10 dark:bg-gray-950 ">

    <div class="container mx-auto overflow-hidden bg-white rounded-lg shadow dark:bg-gray-800">
        <div class="p-8">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Order Details</h2>
            </div>
            <div class="mt-6">

                @foreach ($order_items as $order_item)
                    <div class="flex flex-col justify-between pb-6 border-b border-gray-200 md:flex-row md:items-center">
                        <div class="flex items-center">
                            <img class="object-cover w-24 h-24 mr-4 rounded-md dark:text-white"
                                src="{{ $order_item->product->image }}" alt="{{ $order_item->product->product_name }}">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white ">
                                    {{ $order_item->product->product_name }}
                                </h3>
                                <p class="p-2 text-gray-600 max-w-96 dark:text-white">
                                    {{ $order_item->product->description }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col mt-4min-w-full md:mt-0">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600 dark:text-white">Price:</span>
                                <span class="font-semibold text-gray-900 dark:text-white">&euro;
                                    {{ $order_item->product_price }}</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600 dark:text-white">Total:</span>
                                <span
                                    class="font-semibold text-gray-900 dark:text-white">{{ $order_item->quantity }}</span>
                            </div>

                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600 dark:text-white">Total :</span>
                                <span class="font-semibold text-gray-900 dark:text-white">&euro;
                                    {{ $order_item->price }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="flex justify-between pt-6 border-t border-gray-200">
                <span class="text-lg text-gray-800 dark:text-white">Total:</span>
                <span class="text-lg font-semibold text-gray-900 dark:text-white">&euro; {{ $order->total }}</span>
            </div>

            <div class="mt-6">
                <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Invoice address</h3>
                <div class="flex flex-col justify-between md:flex-row">
                    <div class="w-full md:w-1/2">
                        <p class="text-gray-600 dark:text-white">
                            <span class="font-semibold">Name:</span>
                            {{ $order->billing_firstname }} {{ $order->billing_lastname }}
                        </p>
                        <p class="text-gray-600 dark:text-white">
                            <span class="font-semibold">Address:</span>
                            {{ $order->billing_address }} {{ $order->billing_housenumber }},
                            {{ $order->billing_zipcode }} {{ $order->billing_city }},
                            {{ $order->billing_country }}
                        </p>
                    </div>
                    <div class="w-full mt-4 md:w-1/2 md:mt-0">
                        <p class="text-gray-600 dark:text-white">
                            <span class="font-semibold">E-mail:</span>
                            {{ $order->billing_email }}
                        </p>
                        <p class="text-gray-600 dark:text-white">
                            <span class="font-semibold">Phone number:</span>
                            {{ $order->billing_phonenumber }}
                        </p>
                    </div>
                </div>

            </div>
            <div class="mt-6">
                <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Shipping Address </h3>
                <div class="flex flex-col justify-between md:flex-row">
                    <div class="w-full md:w-1/2">
                        <p class="text-gray-600 dark:text-white">
                            <span class="font-semibold">Name:</span>
                            {{ $order->shipping_firstname }} {{ $order->shipping_lastname }}
                        </p>
                        <p class="text-gray-600 dark:text-white">
                            <span class="font-semibold">Address:</span>
                            {{ $order->shipping_address }} {{ $order->shipping_housenumber }},
                            {{ $order->shipping_zipcode }} {{ $order->shipping_city }},
                            {{ $order->shipping_country }}
                        </p>
                    </div>
                    <div class="w-full mt-4 md:w-1/2 md:mt-0">
                        <p class="text-gray-600 dark:text-white">
                            <span class="font-semibold">E-mail:</span>
                            {{ $order->shipping_email }}
                        </p>
                        <p class="text-gray-600 dark:text-white">
                            <span class="font-semibold">Phone number:</span>
                            {{ $order->shipping_phonenumber }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

