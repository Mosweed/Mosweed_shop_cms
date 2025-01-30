<section class="min-h-screen overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800">
    <div class="w-full px-4 py-4 lg:py-8 md:px-6">
        <div class="flex flex-wrap h-full -mx-4">
            <div class="w-full px-4 md:w-1/2 ">
                <div class="sticky top-0 z-50 overflow-hidden ">
                    <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
                        <img src="{{ $product->image }}" alt="{{ $product->product_name }}"
                            class="object-cover w-full lg:h-full ">
                    </div>

                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 ">
                <div class="lg:pl-20">
                    <div class="mb-8 ">
                        <h2 class="max-w-xl mt-2 mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                            {{ $product->product_name }}</h2>

                        <p class="max-w-md mb-8 text-gray-700 dark:text-gray-400">
                            {{ $product->description }}
                        </p>
                        <p class="inline-block mb-8 text-4xl font-bold text-gray-700 dark:text-gray-400 ">
                            <span>&euro; {{ $product->price }} </span>

                        </p>
                    </div>
                    <div class="flex flex-wrap items-center justify-between mb-8 -mx-4">
                        <div class="w-32 mb-8 ">
                            <label for=""
                                class="w-full text-xl font-semibold text-gray-700 dark:text-gray-400">Quantity</label>
                                <div class="flex items-center">
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                        wire:click='decrementQty()'>
                                        <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="counter-input" data-input-counter
                                        class="w-10 text-sm font-medium text-center text-gray-900 bg-transparent border-0 shrink-0 focus:outline-none focus:ring-0 dark:text-white"
                                        placeholder="" value="{{ $quantity}}" required />
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                        wire:click='incrementQty()'>
                                        <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                        </div>

                        <div class="w-32 mb-8">

                            <label for=""
                                class="w-full text-xl font-semibold text-gray-700 dark:text-gray-400">size</label>
                            <div class="relative flex flex-row w-full h-10 mt-4 bg-transparent rounded-lg">

                                <select wire:model="size"
                                    class="flex w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none items center dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black">
                                    <option value="">Select size</option>
                                    <option value="xs">xs</option>
                                    <option value="s">s</option>
                                    <option value="m">m</option>
                                    <option value="l">l</option>
                                    <option value="xl">xl</option>
                                </select>

                            </div>

                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 ">
                        <div class="w-full px-4 mb-4 lg:w-1/2 lg:mb-0">
                            <button wire:click="add_to_cart"
                                class="flex items-center justify-center w-full p-4 text-blue-500 border border-blue-500 rounded-md dark:text-gray-200 dark:border-blue-600 hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100 dark:bg-blue-600 dark:hover:bg-blue-700 dark:hover:border-blue-700 dark:hover:text-gray-300">
                                Add to Cart
                            </button>
                        </div>
                        <div class="w-full px-4 mb-4 lg:mb-0 lg:w-1/2">
                            <button
                                class="flex items-center justify-center w-full p-4 text-blue-500 border border-blue-500 rounded-md dark:text-gray-200 dark:border-blue-600 hover:bg-blue-600 hover:border-blue-600 hover:text-gray-100 dark:bg-blue-600 dark:hover:bg-blue-700 dark:hover:border-blue-700 dark:hover:text-gray-300">
                                Add to wishlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>