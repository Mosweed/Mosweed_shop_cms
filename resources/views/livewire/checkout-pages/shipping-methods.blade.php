<div class="grid gap-6 mt-6">
    <p class="mt-8 text-lg font-medium dark:text-gray-200 ">Shipping Methods </p>

    @if ($shippingMethods->isEmpty() || $paymentMethodcount == 0)
        <div class="flex items-center justify-center h-64">
            <p class="text-lg font-semibold text-gray-500">No Shipping Methods Available</p>
        </div>
    @else
        @foreach ($shippingMethods as $shippingMethod)


    
        <div class="relative" wire:key='shippingMethod_{{ $shippingMethod->id }}' 

            @if ($shippingMethod->type == 'Free' && $shippingMethod->min_order_amount > $totalprice  )
            hidden

            

            @elseif ($cachPaymentMethod == 0  &&  $shippingMethod->type == "Local_pickup" )
            hidden
            @endif
          
            >
            <input class="hidden peer dark: bg-red" wire:model='selctedShippingMethod' type="radio"
                value="{{ $shippingMethod->id }}" id="{{ $shippingMethod->name }}" name="{{ $shippingMethod->name }}"
                wire:change='changemethod({{ $shippingMethod->id }})'  />
            <span
            class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full dark:bg-gray-800 dark:border-gray-50 peer-checked:border-gray-50 peer-checked:bg-red-700 right-4 top-1/2"></span>
            <label
            class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none dark:border-gray-50 peer-checked:border-2 peer-checked:border-gray-50 peer-checked:bg-green-500 dark:peer-checked:bg-green-500"
                for="{{ $shippingMethod->name }}">
                <img class="object-contain w-14" src="{{ url($shippingMethod->image) }}" alt="" />
                <div class="ml-5">
                    <span class="mt-2 font-semibold dark:text-gray-200 ">{{ $shippingMethod->name }}</span>
                    <p class="text-sm leading-6 text-slate-500 dark:text-gray-200 ">Delivery: 2-4 Days</p>
                </div>
            </label>
        </div>

        
        @endforeach
    @endif

</div>
