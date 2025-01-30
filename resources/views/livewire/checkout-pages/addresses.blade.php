

<div class="grid gap-6 mt-6">
    <p class="mt-8 text-lg font-medium dark:text-gray-200">Invoice address</p>

    @foreach ($billing_addresses as $billing_addresse)
    <div class="relative" wire:key="{{ $billing_addresse->id }}">
        <input class="hidden peer dark:bg-red" wire:model='selcted_Billing_aadress' type="radio" value="{{ $billing_addresse->id }}" id="BillingAddress_{{ $billing_addresse->address }}_{{ $billing_addresse->housenumber }}_{{ $billing_addresse->id }}" name="BillingAddress_{{ $billing_addresse->address }}_{{ $billing_addresse->housenumber }}_{{ $billing_addresse->id }}" wire:change='selectbillingaddress({{ $billing_addresse->id }})' />
        <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full dark:bg-gray-800 dark:border-gray-50 peer-checked:border-gray-50 peer-checked:bg-red-700 right-4 top-1/2"></span>
        <label class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none dark:border-gray-50 peer-checked:border-2 peer-checked:border-gray-50 peer-checked:bg-green-500 dark:peer-checked:bg-green-500" for="BillingAddress_{{ $billing_addresse->address }}_{{ $billing_addresse->housenumber }}_{{ $billing_addresse->id }}">
            <div class="ml-5">
                <span class="mt-2 font-semibold dark:text-gray-200">{{ $billing_addresse->address }}.{{ $billing_addresse->housenumber }}</span>
                <p class="mt-2 font-semibold dark:text-gray-200">{{ $billing_addresse->zipcode }} .{{ $billing_addresse->city }}</p>
                <span class="mt-2 font-semibold dark:text-gray-200">{{ $billing_addresse->country }}</span>
            </div>

            <a wire:click='delete_billing({{ $billing_addresse->id }})' class="px-4 py-2 m-auto font-bold text-white bg-red-700 rounded-xl">
                <i class="fa-solid fa-trash"></i> </a>
        </label>
    </div>
    @endforeach

    <label wire:click='add_new_billing' class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none dark:border-gray-600 peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 dark:peer-checked:bg-gray-700">
        <div class="ml-5">
            <span class="w-full mt-2 font-semibold dark:text-gray-200">Shipping Address</span>
        </div>
    </label>

    <div class="grid gap-6 mt-6">
        <p class="mt-8 text-lg font-medium dark:text-gray-200">Delivery Address </p>

        @foreach ($shipping_addresses as $shipping_addresse)
        <div class="relative pb-3" wire:key="{{ $shipping_addresse->id }}">
            <input class="hidden peer dark:bg-red" wire:model='selcted_Shipping_aadress' type="radio" value="{{ $shipping_addresse->id }}" id="shippingAddress_{{ $shipping_addresse->address }}_{{ $shipping_addresse->housenumber }}_{{ $shipping_addresse->id }}" name="shippingAddress_{{ $shipping_addresse->address }}_{{ $shipping_addresse->housenumber }}_{{ $shipping_addresse->id }}" wire:change='selectshippingaddress({{ $shipping_addresse->id }})' />
            <span class="box-content absolute block w-3 h-3 -translate-y-1/2 bg-white border-8 border-gray-300 rounded-full dark:bg-gray-800 dark:border-gray-50 peer-checked:border-gray-50 peer-checked:bg-red-700 right-4 top-1/2"></span>
            <label class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none dark:border-gray-50 peer-checked:border-2 peer-checked:border-gray-50 peer-checked:bg-green-500 dark:peer-checked:bg-green-500" for="shippingAddress_{{ $shipping_addresse->address }}_{{ $shipping_addresse->housenumber }}_{{ $shipping_addresse->id }}">
                <div class="ml-5">
                    <span class="mt-2 font-semibold dark:text-gray-200">{{ $shipping_addresse->address }}.{{ $shipping_addresse->housenumber }}</span>
                    <p class="mt-2 font-semibold dark:text-gray-200">{{ $shipping_addresse->zipcode }} .{{ $shipping_addresse->city }}</p>
                    <span class="mt-2 font-semibold dark:text-gray-200">{{ $shipping_addresse->country }}</span>
                </div>

                <a wire:click='delete_shipping({{ $shipping_addresse->id }})' class="px-4 py-2 m-auto font-bold text-white bg-red-700 rounded-xl">
                    <i class="fa-solid fa-trash"></i> </a>
            </label>
        </div>
        @endforeach

        <label wire:click='add_new_shipping' class="flex p-4 border border-gray-300 rounded-lg cursor-pointer select-none dark:border-gray-600 peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 dark:peer-checked:bg-gray-700">
            <div class="ml-5">
                <span class="w-full mt-2 font-semibold dark:text-gray-200">New Delivery Address</span>
            </div>
        </label>
    </div>
</div>
