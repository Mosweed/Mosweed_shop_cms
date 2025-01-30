<div class="px-2 py-4 mt-8 space-y-3 bg-white border rounded-lg dark:bg-gray-800 sm:px-6">

    @foreach ($cartItems as $cartItem)
        <div class="flex flex-col bg-white rounded-lg dark:bg-gray-800 sm:flex-row">
            <img class="object-cover object-center h-24 m-2 border rounded-md w-28"
                src="{{ url($cartItem->product->image) }}"
                alt="" />
            <div class="flex flex-col w-full px-4 py-4">
                <span class="font-semibold dark:text-gray-200 ">{{ $cartItem->product->product_name }}</span>
                
                <span class="float-right text-gray-400 dark:text-gray-200"> {{ $cartItem->product->price  }} * {{ $cartItem->quantity  }}</span>
                <p class="text-lg font-bold dark:text-gray-200 ">{{ $cartItem->shopcartitem_price }} </p> 
            </div>
        </div>
    @endforeach

    
</div>
