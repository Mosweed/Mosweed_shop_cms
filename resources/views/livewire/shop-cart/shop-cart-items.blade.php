

 <div class="min-h-screen p-4 dark:bg-gray-900 dark:text-white">

    <section class="min-h-screen py-8 bg-white an ialiasedn dark:bg-gray-900 md:py-16 ">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>
            <x-swal />
            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="flex-none w-full mx-auto lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        @foreach ($cart as $cartitem)
                            <div
                                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                    <a href="#" class="shrink-0 md:order-1">
                                        <img class="w-20 h-20 dark:hidden" src="{{ $cartitem->image }}"
                                            alt="{{ $cartitem->product_name }}" />
                                        <img class="hidden w-20 h-20 dark:block" src="{{ $cartitem->image }}"
                                            alt="{{ $cartitem->product_name }}" />
                                    </a>
                                    <label for="counter-input" class="sr-only">Choose quantity:</label>
                                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                                        <div class="flex items-center">
                                            <button type="button"
                                                class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                                wire:click='decrementQty({{ $cartitem->id }})'>
                                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="counter-input" data-input-counter
                                                class="w-10 text-sm font-medium text-center text-gray-900 bg-transparent border-0 shrink-0 focus:outline-none focus:ring-0 dark:text-white"
                                                placeholder="" value="{{ $cartitem->quantity }}" required />
                                            <button type="button"
                                                class="inline-flex items-center justify-center w-5 h-5 bg-gray-100 border border-gray-300 rounded-md shrink-0 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                                wire:click='incrementQty({{ $cartitem->id }})'>
                                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="text-end md:order-4 md:w-32">
                                            <p class="text-base font-bold text-gray-900 dark:text-white">&euro;
                                                {{ $cartitem->price }}</p>
                                        </div>
                                    </div>
                                    <div class="flex-1 w-full min-w-0 space-y-4 md:order-2 md:max-w-md">
                                        <a href="#"
                                            class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $cartitem->product_name }}</a>
                                        <div class="flex items-center gap-4">
                                            <button type="button"
                                                class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500"
                                                wire:click='remove_item({{ $cartitem->id }})'>
                                                <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex-1 max-w-3xl mx-auto mt-6 space-y-6 lg:mt-0 lg:w-full">
                    <div
                        class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price
                                    </dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">&euro;
                                        {{ $total }}</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                    <dd class="text-base font-medium text-green-600">&euro;{{ $savings }} </dd>
                                </dl>
                            </div>
                            <dl
                                class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">&euro;
                                    @if ($savings > 0)
                                    {{ $total -  $savings }}
                                    
                                @else
                                    {{ $total }}
                                    
                                @endif
                                </dd>
                            </dl>
                        </div>
                        <a href="@if (Auth::check()) {{ route('checkout') }} @else {{ route('login_register') }} @endif"
                            class="flex w-full items-center justify-center dark:text-white rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceed
                            to Checkout</a>

                    </div>
                    <div
                        class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <form wire:submit.prevent="applyCoupon" class="space-y-4">
                            <div>
                                <label for="voucher"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Do you have a voucher or gift card? </label>
                                <input type="text" id="voucher" wire:model="applyCouponcode"
                                    class="block dark:text-white w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="" required />
                            </div>
                            <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Apply
                                Code</button>
                        </form>


                        <div class="space-y-4">
                            @if ($couponCode != null)
                           <h2 class="text-lg font-medium text-gray-900 dark:text-white">Your Coupons</h2>
                           <div class="space-y-2">
                              
                                   <div
                                       class="flex items-center justify-between p-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                       <span class="text-sm text-gray-900 dark:text-white">{{ $couponCode }}</span>
                                       <button type="button" class="text-red-600 hover:text-red-800"
                                           wire:click="RemoveCoupon()">Remove</button>
                                   </div>
                              


                           </div>
                            @endif
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 </div>

 
@script
    <script>

        window.addEventListener('swal-invalid-code', (e) => {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Invalid Coupon Code",
            });
        });
        
        window.addEventListener('swal_total_less', (e) => {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Your total amount is less than the coupon amount",
            });
        });

        window.addEventListener('swal-one-time' , (e) => {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "You can only use this coupon once",
            });
        });


        //swal-limit 
        window.addEventListener('swal-limit' , (e) => {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "You have reached the limit of this coupon",
            });
        });
    </script>
@endscript
