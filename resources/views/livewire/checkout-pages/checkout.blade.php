<div>
    <div class="flex flex-col items-center py-4 bg-white border-b dark:bg-gray-800 sm:flex-row sm:px-10 lg:px-20 xl:px-32">

    </div>
    <div class="grid sm:px-10 lg:grid-cols-3 lg:px-20 xl:px-32 dark:bg-gray-800 ">
        <div class="px-4 pt-8 dark:bg-gray-800 ">
            <p class="text-xl font-medium dark:text-gray-200">Order Summary</p>
            <p class="text-gray-400 dark:text-gray-200 " >Check your items. And select a suitable shipping method.</p>

            <div class="px-4 pt-8 dark:bg-gray-800 ">
                <livewire:checkout-pages.addresses>

            </div>


            <div class="pb-16 " >
                <livewire:checkout-pages.shipping-methods>
            </div>

        </div>
        <div class="px-4 pt-8 mt-10 bg-white dark:bg-gray-800 lg:mt-0">

            <livewire:checkout-pages.cart-items>
        </div>





        <div class="px-4 pt-8 mt-10 bg-white dark:bg-gray-800 lg:mt-0">

            <div class="flex-1 max-w-2xl mx-auto mt-6 space-y-6 lg:mt-0 lg:w-full">
                <div
                    class="p-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price
                                </dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">&euro;
                                    {{ $Subtotal }}
                                </dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                <dd class="text-base font-medium text-green-600">&euro;{{ round($savings,2) }}
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Shipping</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">&euro;
                                    {{ round($ShippingMethodCost,2) }}
                                </dd>
                        </div>
                        <dl
                            class="flex items-center justify-between gap-4 pt-2 border-t border-gray-200 dark:border-gray-700">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white">&euro;
                                {{ round($TotalPrice + $ShippingMethodCost ,2) }}</dd>
                        </dl>
                    </div>

                </div>



            </div>



        

          
            <livewire:checkout-pages.payments-methods>
             
                <!-- Payment Methods -->

                <button wire:click='Place_order' class="w-full px-6 py-3 mt-4 mb-8 font-medium text-white bg-gray-900 rounded-md

                
                    @if (
                        $PymentMethod == null ||
                            $ShippingAddress == null ||
                            $BillingAddress == null ||
                            $ShippingMethod == null ||
                            $TotalPrice == null) bg-gray-400 cursor-not-allowed @endif" @if ( $PymentMethod==null ||
                    $BillingAddress==null || $ShippingAddress==null || $ShippingMethod==null || $TotalPrice==null)
                    disabled @endif  >Place
                    Order</button>
        </div>
    </div>
</div>