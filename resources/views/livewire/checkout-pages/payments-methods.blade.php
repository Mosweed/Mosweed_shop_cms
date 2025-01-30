<div class="grid gap-6 mt-6">
    <p class="text-xl font-medium dark:text-gray-200">Payment Details</p>
            <p class="text-gray-400 dark:text-gray-200 ">Complete your order by providing your payment details.</p>
    @if ($Methods == null || $Methods->isEmpty())
        <div class="flex items-center justify-center h-64">
            <p class="text-lg font-semibold text-gray-500">No Payments Methods Available</p>
        </div>
        @else

    @foreach ($Methods as $paymentsMethod)

        <div class="relative"   @if($paymentsMethod->Payments_methods_id == 'cash' && $selctedShippingMethodType != 'Local_pickup' ) hidden @endif >

            <input class="hidden peer dark: bg-red" wire:model='selctedPaymentsMethod' type="radio"
                value="{{$paymentsMethod->Payments_methods_id}}" id="{{ $paymentsMethod->Payments_methods_id }}" wire:change='selectmethod({{ $paymentsMethod }})' />
            <span
                class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full dark:bg-gray-800 dark:border-gray-50 peer-checked:border-gray-50 peer-checked:bg-red-700 right-4 top-1/2"></span>
            <label
                class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none dark:border-gray-50 peer-checked:border-2 peer-checked:border-gray-50 peer-checked:bg-green-500 dark:peer-checked:bg-green-500"
                for="{{ $paymentsMethod->Payments_methods_id }}">
                <img class="object-contain w-14" src="{{ $paymentsMethod->image }}" alt="" />
                <div class="ml-5">
                    <span class="mt-2 font-semibold dark:text-gray-200 ">{{ $paymentsMethod->description }}</span>
                </div>
            </label>
        </div>
    @endforeach


    @endif

</div>
