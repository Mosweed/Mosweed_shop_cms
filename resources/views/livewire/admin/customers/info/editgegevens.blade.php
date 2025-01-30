<div class="min-h-screen pt-6 antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white pb-9">

<x-swal/>


@if($customer->user_id != null && $customer->user != null)
<div class="p-6 mx-6 mt-6 bg-gray-200 fi-section-content dark:divide-white/10 dark:bg-gray-900 ">

        @livewire('admin.customers.info.userinfo' ,['id' => $customer->user_id ], key($customer->user_id))
   
    </div>
@endif


<div class="p-6 mx-6 mt-6 bg-gray-200 fi-section-content dark:divide-white/10 dark:bg-gray-900 ">
    @livewire('admin.customers.info.customerinfo', ['id' => $customer->id ], key($customer->id))

    </div>

@if(count($customer->addresses) != 0)
    <div class="p-6 mx-6 mt-6 bg-gray-200 fi-section-content dark:divide-white/10 dark:bg-gray-900 ">
    
    @livewire('admin.customers.info.addresinfo', ['addresses' => $customer->addresses ], key($customer->id) )
</div>

@endif

</div>
