<?php

use App\Livewire\Admin\Category\Categorycreate;
use App\Livewire\Admin\Category\Categoryedit;
use App\Livewire\Admin\Category\Categoryoverview;
use App\Livewire\Admin\Coupons\Couponcreate;
use App\Livewire\Admin\Coupons\Couponedit;
use App\Livewire\Admin\Coupons\Couponsoverview;
use App\Livewire\Admin\Customers\Customerscreate;
use App\Livewire\Admin\Customers\Customerstable;
use App\Livewire\Admin\Customers\Info\Editgegevens;
use App\Livewire\Admin\Dashboard\Dashboard;
use App\Livewire\Admin\Email\Emailcreate;
use App\Livewire\Admin\Email\Emailedit;
use App\Livewire\Admin\Email\Emailinfo;
use App\Livewire\Admin\Ordersemail\Ordermailcreate;
use App\Livewire\Admin\Ordersemail\Ordermailinfo;
use App\Livewire\Admin\OrdersPages\Orderpage;
use App\Livewire\Admin\OrdersPages\Orders;
use App\Livewire\Admin\PaymentsMethods\PaymentsMethods;
use App\Livewire\Admin\PaymentsMethods\PaymentsMethodsCreate;
use App\Livewire\Admin\PaymentsMethods\PaymentsMethodsEdite;
use App\Livewire\Admin\Products\Productecreate;
use App\Livewire\Admin\Products\Productedit;
use App\Livewire\Admin\Products\Productinfo;
use App\Livewire\Admin\Setting\ApiConfigration;
use App\Livewire\Admin\Shipping\Shippingcreate;
use App\Livewire\Admin\Shipping\Shippingedit;
use App\Livewire\Admin\Shipping\Shippingoverview;
use Illuminate\Support\Facades\Route;





        Route::get('/orders', Orders::class)->name('admin.orders');

        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/orders/{id}', Orderpage::class)->name('admin.orderpage');


        Route::get('/customers', Customerstable::class)->name('admin.show.customers');
        Route::get('/createcustomer', Customerscreate::class)->name('admin.create.customers');

        Route::get('/editgegevens/{id}', Editgegevens::class)->name('admin.edit.gegevens');

        Route::get('/prodcuts', Productinfo::class)->name('admin.show.prodcuts');

        Route::get('/createprodcut', Productecreate::class)->name('admin.create.prodcuts');

        Route::get('/editproduct/{id}', Productedit::class)->name('admin.edit.prodcuts');

        Route::get('/coupons', Couponsoverview::class)->name('admin.show.coupons');
        Route::get('/couponcreate', Couponcreate::class)->name('admin.create.coupons');
        Route::get('/couponedit/{id}', Couponedit::class)->name('admin.edit.coupons');

        // for categories show / create / edit
        Route::get('/categories', Categoryoverview::class)->name('admin.show.categories');
        Route::get('/createcategory', Categorycreate::class)->name('admin.create.categories');
        Route::get('/editcategory/{id}', Categoryedit::class)->name('admin.edit.categories');

        Route::get('/shipping', Shippingoverview::class)->name('admin.show.shipping');
        Route::get('/createshipping', Shippingcreate::class)->name('admin.create.shipping');
        Route::get('/editshipping/{id}', Shippingedit::class)->name('admin.edit.shipping');



        Route::get('/emailconfiguratie', Emailinfo::class)->name('admin.show.emailconfiguratie');
        Route::get('/createemailconfiguratie', Emailcreate::class)->name('admin.create.emailconfiguratie');
        Route::get('/editemailconfiguratie/{id}', Emailedit::class)->name('admin.edit.emailconfiguratie');

        Route::get('/ordermails', Ordermailinfo::class)->name('admin.show.ordermails');
        Route::get('/Ordermailcreate', Ordermailcreate::class)->name('admin.create.ordermails');

        Route::get('/Api_configration', ApiConfigration::class)->name('admin.Api_configration');

        Route::get('/paymentmethods', PaymentsMethods::class)->name('admin.paymentmethods');
        Route::get('/paymentmethods/create', PaymentsMethodsCreate::class)->name('admin.create.paymentmethods');

        Route::get('/paymentmethods/{id}', PaymentsMethodsEdite::class)->name('admin.edit.paymentmethods');