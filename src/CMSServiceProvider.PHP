<?php
namespace Mosweed\mosweed_shop_cms;

use App\Actions\UpdateProfileInformationData;
use App\Livewire\Admin\Category\Categorycreate;
use App\Livewire\Admin\Category\Categoryedit;
use App\Livewire\Admin\Category\Categoryoverview;
use App\Livewire\Admin\Coupons\Couponcreate;
use App\Livewire\Admin\Coupons\Couponedit;
use App\Livewire\Admin\Coupons\Couponsoverview;
use App\Livewire\Admin\Customers\Customerscreate;
use App\Livewire\Admin\Customers\Customersedit;
use App\Livewire\Admin\Customers\Customerstable;
use App\Livewire\Admin\Customers\Info\Addresinfo;
use App\Livewire\Admin\Customers\Info\Customerinfo;
use App\Livewire\Admin\Customers\Info\Editgegevens;
use App\Livewire\Admin\Customers\Info\Userinfo;
use App\Livewire\Admin\Dashboard\Dashboard;
use App\Livewire\Admin\Email\Emailcreate;
use App\Livewire\Admin\Email\Emailedit;
use App\Livewire\Admin\Email\Emailinfo;
use App\Livewire\Admin\Ordersemail\Ordermailcreate;
use App\Livewire\Admin\Ordersemail\Ordermailinfo;
use App\Livewire\Admin\OrdersPages\Orderitems;
use App\Livewire\Admin\OrdersPages\Orderpage;
use App\Livewire\Admin\OrdersPages\Orders;
use App\Livewire\Admin\PaymentsMethods\PaymentsMethodsCreate;
use App\Livewire\Admin\PaymentsMethods\PaymentsMethodsEdite;
use App\Livewire\Admin\Products\Productecreate;
use App\Livewire\Admin\Products\Productedit;
use App\Livewire\Admin\Products\Productinfo;
use App\Livewire\Admin\Setting\ApiConfigration;
use App\Livewire\Admin\Shipping\Shippingcreate;
use App\Livewire\Admin\Shipping\Shippingedit;
use App\Livewire\Admin\Shipping\Shippingoverview;
use App\Livewire\CheckoutPages\Addresses;
use App\Livewire\CheckoutPages\CartItems;
use App\Livewire\CheckoutPages\Checkout;
use App\Livewire\CheckoutPages\PaymentsMethods;
use App\Livewire\CheckoutPages\Register;
use App\Livewire\CheckoutPages\ShippingMethods;
use App\Livewire\Logout;
use App\Livewire\OrderPages\OrderDetails;
use App\Livewire\OrderPages\OrderHistory;
use App\Livewire\ProductsPages\Productdetails;
use App\Livewire\ProductsPages\Products;
use App\Livewire\ShopCart\Cartcounter;
use App\Livewire\ShopCart\ShopCartItems;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Mosweed\mosweed_shop_cms\Commands\CreateAdminCommand;
use Mosweed\mosweed_shop_cms\Commands\InstallCMSCommand;
use Mosweed\mosweed_shop_cms\Commands\SMTPSittingCommand;

class CMSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->Livewire_components();
        $this->configureCommands();
        $this->configurePublishing();

    }

    protected function Livewire_components()
    {

        /**
         * admin pages
         */
        // category

        Livewire::component('categoryoverview', Categoryoverview::class);
        Livewire::component('categoryedit', Categoryedit::class);
        Livewire::component('categorycreate', Categorycreate::class);

        // coupons
        Livewire::component('couponsoverview', Couponsoverview::class);
        Livewire::component('couponedit', Couponedit::class);
        Livewire::component('couponcreate', Couponcreate::class);

        // customers
        Livewire::component('customerscreate', Customerscreate::class);
        Livewire::component('customersedit', Customersedit::class);
        Livewire::component('customerstable', Customerstable::class);
        Livewire::component('addresinfo', Addresinfo::class);
        Livewire::component('customerinfo', Customerinfo::class);
        Livewire::component('editgegevens', Editgegevens::class);
        Livewire::component('userinfo', Userinfo::class);

        // dashboard
        Livewire::component('dashboard', Dashboard::class);


        // email
        Livewire::component('emailcreate', Emailcreate::class);
        Livewire::component('emailedit', Emailedit::class);
        Livewire::component('emailinfo', Emailinfo::class);



        // ordersemail
        Livewire::component('ordermailinfo', Ordermailinfo::class);
        Livewire::component('ordermailcreate', Ordermailcreate::class);

        // orders pages

        Livewire::component('orders', Orders::class);
        Livewire::component('orderpage', Orderpage::class);
        Livewire::component('orderitems', Orderitems::class);



        // pyments methods
        Livewire::component('payments-methods', PaymentsMethods::class);
        Livewire::component('payments-methods-create', PaymentsMethodsCreate::class);
        Livewire::component('payments-methods-edite', PaymentsMethodsEdite::class);

        // products

        Livewire::component('productinfo', Productinfo::class);
        Livewire::component('productedit', Productedit::class);
        Livewire::component('productecreate', Productecreate::class);

        //settings
        Livewire::component('api-configration', ApiConfigration::class);

// shipping
        Livewire::component('shippingoverview', Shippingoverview::class);
        Livewire::component('shippingedit', Shippingedit::class);
        Livewire::component('shippingcreate', Shippingcreate::class);

// user profile

        Livewire::component('update-profile-info-data', UpdateProfileInformationData::class);
        /**
         * user pages
         */

        // checkout
        Livewire::component('addresses', Addresses::class);
        Livewire::component('cart-items', CartItems::class);
        Livewire::component('checkout', Checkout::class);
        Livewire::component('payments-methods', PaymentsMethods::class);
        Livewire::component('register', Register::class);
        Livewire::component('shipping-methods', ShippingMethods::class);

        // OrderPages
        Livewire::component('order-details', OrderDetails::class);
        Livewire::component('order-history', OrderHistory::class);

        //ProductsPages
        Livewire::component('products', Products::class);
        Livewire::component('productdetails', Productdetails::class);

        // shopcart
        Livewire::component('cartcounter', Cartcounter::class);
        Livewire::component('shop-cart-items', ShopCartItems::class);
        // logout
        Livewire::component('logout', Logout::class);

    }

    protected function configurePublishing()
    {


        $this->publishes([
            __DIR__ . '/../lang' => base_path('lang'),
        ], 'CMS-lang');

        $this->publishes([
            __DIR__ . '/../app/Models/Address.php' => app_path('Models/Address.php'),
            __DIR__ . '/../app/Models/Customer.php' => app_path('Models/Customer.php'),
            __DIR__ . '/../app/Models/Order_items.php' => app_path('Models/Order_items.php'),
            __DIR__ . '/../app/Models/Orders.php' => app_path('Models/Orders.php'),
            __DIR__ . '/../app/Models/Role.php' => app_path('Models/Role.php'),
            __DIR__ . '/../app/Models/Shopcart.php' => app_path('Models/Shopcart.php'),
            __DIR__ . '/../app/Models/Product.php' => app_path('Models/Product.php'),
            __DIR__ . '/../app/Models/Payments_methods.php' => app_path('Models/Payments_methods.php'),
            __DIR__ . '/../app/Models/Shipping_methods.php' => app_path('Models/Shipping_methods.php'),
            __DIR__ . '/../app/Models/Sessions.php' => app_path('Models/Sessions.php'),
            __DIR__ . '/../app/Models/Category.php' => app_path('Models/Category.php'),
            __DIR__ . '/../app/Models/coupon.php' => app_path('Models/coupon.php'),
            __DIR__ . '/../app/Models/emailconfiguratie.php' => app_path('Models/emailconfiguratie.php'),
            __DIR__ . '/../app/Models/OrdersEmails.php' => app_path('Models/OrdersEmails.php'),
            __DIR__ . '/../app/Models/RedeemCoupon.php' => app_path('Models/RedeemCoupon.php'),
            __DIR__ . '/../app/Models/API_configration.php' => app_path('Models/API_configration.php'),

        ], 'CMS-models');

        $this->publishes([
            // __DIR__ . '/../database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php' => database_path('migrations/2019_12_14_000001_create_personal_access_tokens_table.php'),
            // __DIR__ . '/../database/migrations/2014_10_12_200000_add_two_factor_columns_to_users_table.php' => database_path('migrations/2014_10_12_200000_add_two_factor_columns_to_users_table.php'),
            __DIR__ . '/../database/migrations/2024_02_22_090643_create_customers_table.php' => database_path('migrations/2024_02_22_090643_create_customers_table.php'),
            __DIR__ . '/../database/migrations/2024_02_22_091256_create_order_items_table.php' => database_path('migrations/2024_02_22_091256_create_order_items_table.php'),
            __DIR__ . '/../database/migrations/2024_02_22_091312_create_orders_table.php' => database_path('migrations/2024_02_22_091312_create_orders_table.php'),
            __DIR__ . '/../database/migrations/2024_02_22_121055_create_addresses_table.php' => database_path('migrations/2024_02_22_121055_create_addresses_table.php'),
            __DIR__ . '/../database/migrations/2024_05_13_084158_create_roles_table.php' => database_path('migrations/2024_05_13_084158_create_roles_table.php'),
            __DIR__ . '/../database/migrations/2024_02_05_095314_create_shopcarts_table.php' => database_path('migrations/2024_02_05_095314_create_shopcarts_table.php'),
            __DIR__ . '/../database/migrations/2024_02_05_095243_create_products_table.php' => database_path('migrations/2024_02_05_095243_create_products_table.php'),
            __DIR__ . '/../database/migrations/2024_02_20_091512_create_payments_methods_table.php' => database_path('migrations/2024_02_20_091512_create_payments_methods_table.php'),
            __DIR__ . '/../database/migrations/2024_02_19_141130_create_shipping_methods_table.php' => database_path('migrations/2024_02_19_141130_create_shipping_methods_table.php'),
            __DIR__ . '/../database/migrations/2024_05_23_125712_create_coupons_table.php' => database_path('migrations/2024_05_23_125712_create_coupons_table.php'),
            __DIR__ . '/../database/migrations/2024_05_24_105658_create_categories_table.php' => database_path('migrations/2024_05_24_105658_create_categories_table.php'),
            __DIR__ . '/../database/migrations/2024_05_29_140700_create_orders_emails_table.php' => database_path('migrations/2024_05_29_140700_create_orders_emails_table.php'),
            __DIR__ . '/../database/migrations/2024_05_29_092320_create_e-mailconfiguraties_table.php' => database_path('migrations/2024_05_29_092320_create_e-mailconfiguraties_table.php'),
            __DIR__ . '/../database/migrations/2024_06_10_203033_create_api_configration_table.php' => database_path('migrations/2024_06_10_203033_create_api_configration_table.php'),

        ], 'CMS-database');

        $this->publishes([
            __DIR__ . '/../database/seeders/ShippingMethodsSeeder.php' => database_path('seeders/ShippingMethodsSeeder.php'),
            __DIR__ . '/../database/seeders/APIConfigrationSeeder.php' => database_path('seeders/APIConfigrationSeeder.php'),
            __DIR__ . '/../database/seeders/ProductSeeder.php' => database_path('seeders/ProductSeeder.php'),
            __DIR__ . '/../database/seeders/CouponSeeder.php' => database_path('seeders/CouponSeeder.php'),
            __DIR__ . '/../database/seeders/CategorySeeder.php' => database_path('seeders/CategorySeeder.php'),

            __DIR__ . '/../database/factories/ProductFactory.php' => database_path('factories/ProductFactory.php'),

        ], 'CMS-seeders-factories');

        $this->publishes([

            //events
            __DIR__ . '/../app/Events/UserLoggedIn.php' => app_path('Events/UserLoggedIn.php'),
            __DIR__ . '/../app/Events/User_Go_to_Checkout.php' => app_path('Events/User_Go_to_Checkout.php'),
            __DIR__ . '/../app/Events/Send_Mail_Order.php' => app_path('Events/Send_Mail_Order.php'),
            __DIR__ . '/../app/Events/EmailSettings.php' => app_path('Events/EmailSettings.php'),
            __DIR__ . '/../app/Events/Pickup_mail.php' => app_path('Events/Pickup_mail.php'),
            __DIR__ . '/../app/Events/Admin_mail.php' => app_path('Events/Admin_mail.php'),

            //listeners
            __DIR__ . '/../app/Listeners/UserLoggedInListener.php' => app_path('Listeners/UserLoggedInListener.php'),
            __DIR__ . '/../app/Listeners/User_Go_to_Checkout_Listener.php' => app_path('Listeners/User_Go_to_Checkout_Listener.php'),
            __DIR__ . '/../app/Listeners/Send_Mail_Order_Listener.php' => app_path('Listeners/Send_Mail_Order_Listener.php'),
            __DIR__ . '/../app/Listeners/EmailSettingsListener.php' => app_path('Listeners/EmailSettingsListener.php'),
            __DIR__ . '/../app/Listeners/Pickup_mail_Listener.php' => app_path('Listeners/Pickup_mail_Listener.php'),
            __DIR__ . '/../app/Listeners/Admin_mail_Listener.php' => app_path('Listeners/Admin_mail_Listener.php'),

//middleware
            __DIR__ . '/../app/Http/Middleware/UserRoleMiddleware.php' => app_path('Http/Middleware/UserRoleMiddleware.php'),

            //rules
            __DIR__ . '/../app/Rules/VatNumber.php' => app_path('Rules/VatNumber.php'),

            // controllers
            __DIR__ . '/../app/Http/Controllers/Auth/RegisterController.php' => app_path('Http/Controllers/Auth/RegisterController.php'),
            __DIR__ . '/../app/Http/Controllers/CheckoutController.php' => app_path('Http/Controllers/CheckoutController.php'),
            __DIR__ . '/../app/Http/Controllers/PDFController.php' => app_path('Http/Controllers/PDFController.php'),

            //mails
            __DIR__ . '/../app/Mail/MailInvoiceCastomer.php' => app_path('Mail/MailInvoiceCastomer.php'),
            __DIR__ . '/../app/Mail/PasswordResetMail.php' => app_path('Mail/PasswordResetMail.php'),
            __DIR__ . '/../app/Mail/TestEmail.php' => app_path('Mail/TestEmail.php'),
            __DIR__ . '/../app/Mail/Pickup_mail.php' => app_path('Mail/Pickup_mail.php'),
            __DIR__ . '/../app/Mail/Admin_mail.php' => app_path('Mail/Admin_mail.php'),

            //commands
            __DIR__ . '/../app/Console/Commands/mollie_pyments_methods_updater.php' => app_path('Console/Commands/mollie_pyments_methods_updater.php'),
            __DIR__ . '/../app/Console/Commands/shopcart_session_controller.php' => app_path('Console/Commands/shopcart_session_controller.php'),

        ], 'CMS-Events-and-Listeners-and-Roles-and-Controllers');

        // publish public files
        $this->publishes([
            __DIR__ . '/../public/admin' => public_path('admin'),

        ], 'CMS-public');

        $this->publishes([
            __DIR__ . '/../storage/public' => storage_path('app/public'),
        ], 'CMS-storage');

        $this->publishes([
            __DIR__ . '/../resources/views/layouts/admin/navbar.blade.php' => resource_path('views/layouts/admin/navbar.blade.php'),
            __DIR__ . '/../resources/views/layouts/admin/sidebar.blade.php' => resource_path('views/layouts/admin/sidebar.blade.php'),

        ], 'CMS-layouts');

        $this->publishes([
            __DIR__ . '/../resources/views/components/chart.blade.php' => resource_path('views/components/chart.blade.php'),
            __DIR__ . '/../resources/views/components/admin.blade.php' => resource_path('views/components/admin.blade.php'),

            __DIR__ . '/../resources/views/components/swal.blade.php' => resource_path('views/components/swal.blade.php'),


        ], 'CMS-components');

        $this->publishes([
            __DIR__ . '/../resources/views/emails/passwordReset.blade.php' => resource_path('views/emails/passwordReset.blade.php'),
            __DIR__ . '/../resources/views/Mail/PDF/InvoicePDF.blade.php' => resource_path('views/Mail/PDF/InvoicePDF.blade.php'),
            __DIR__ . '/../resources/views/Mail/OrderEmail.blade.php' => resource_path('views/Mail/OrderEmail.blade.php'),
            __DIR__ . '/../resources/views/Mail/PickupEmail.blade.php' => resource_path('views/Mail/PickupEmail.blade.php'),
            __DIR__ . '/../resources/views/Mail/configuredMail.blade.php' => resource_path('views/Mail/configuredMail.blade.php'),
            __DIR__ . '/../resources/views/Mail/AdminEmail.blade.php' => resource_path('views/Mail/AdminEmail.blade.php'),

            __DIR__ . '/../resources/views/pdf/Invoice.blade.php' => resource_path('views/pdf/Invoice.blade.php'),

            __DIR__ . '/../resources/views/successfully_paid.blade.php' => resource_path('views/successfully_paid.blade.php'),
            __DIR__ . '/../resources/views/successfully_placed.blade.php' => resource_path('views/successfully_placed.blade.php'),

        ], 'CMS-views');

        $this->publishes([

            /**
             * admin pages
             */
            // category
            __DIR__ . '/../app/Livewire/Admin/Category/Categoryoverview.php' => app_path('Livewire/Admin/Category/Categoryoverview.php'),
            __DIR__ . '/../app/Livewire/Admin/Category/Categoryedit.php' => app_path('Livewire/Admin/Category/Categoryedit.php'),
            __DIR__ . '/../app/Livewire/Admin/Category/Categorycreate.php' => app_path('Livewire/Admin/Category/Categorycreate.php'),

            // coupons
            __DIR__ . '/../app/Livewire/Admin/Coupons/Couponsoverview.php' => app_path('Livewire/Admin/Coupons/Couponsoverview.php'),
            __DIR__ . '/../app/Livewire/Admin/Coupons/Couponedit.php' => app_path('Livewire/Admin/Coupons/Couponedit.php'),
            __DIR__ . '/../app/Livewire/Admin/Coupons/Couponcreate.php' => app_path('Livewire/Admin/Coupons/Couponcreate.php'),

            // customers
            __DIR__ . '/../app/Livewire/Admin/Customers/Customerscreate.php' => app_path('Livewire/Admin/Customers/Customerscreate.php'),
            __DIR__ . '/../app/Livewire/Admin/Customers/Customersedit.php' => app_path('Livewire/Admin/Customers/Customersedit.php'),
            __DIR__ . '/../app/Livewire/Admin/Customers/Customerstable.php' => app_path('Livewire/Admin/Customers/Customerstable.php'),
            __DIR__ . '/../app/Livewire/Admin/Customers/Info/Addresinfo.php' => app_path('Livewire/Admin/Customers/Info/Addresinfo.php'),
            __DIR__ . '/../app/Livewire/Admin/Customers/Info/Customerinfo.php' => app_path('Livewire/Admin/Customers/Info/Customerinfo.php'),
            __DIR__ . '/../app/Livewire/Admin/Customers/Info/Editgegevens.php' => app_path('Livewire/Admin/Customers/Info/Editgegevens.php'),
            __DIR__ . '/../app/Livewire/Admin/Customers/Info/Userinfo.php' => app_path('Livewire/Admin/Customers/Info/Userinfo.php'),

            // dashboard

            __DIR__ . '/../app/Livewire/Admin/Dashboard/Dashboard.php' => app_path('Livewire/Admin/Dashboard/Dashboard.php'),


            // email

            __DIR__ . '/../app/Livewire/Admin/Email/Emailcreate.php' => app_path('Livewire/Admin/Email/Emailcreate.php'),
            __DIR__ . '/../app/Livewire/Admin/Email/Emailedit.php' => app_path('Livewire/Admin/Email/Emailedit.php'),
            __DIR__ . '/../app/Livewire/Admin/Email/Emailinfo.php' => app_path('Livewire/Admin/Email/Emailinfo.php'),


            // ordersemail
            __DIR__ . '/../app/Livewire/Admin/Ordersemail/Ordermailcreate.php' => app_path('Livewire/Admin/Ordersemail/Ordermailcreate.php'),
            __DIR__ . '/../app/Livewire/Admin/Ordersemail/Ordermailinfo.php' => app_path('Livewire/Admin/Ordersemail/Ordermailinfo.php'),

            // orders pages
            __DIR__ . '/../app/Livewire/Admin/OrdersPages/Orderitems.php' => app_path('Livewire/Admin/OrdersPages/Orderitems.php'),
            __DIR__ . '/../app/Livewire/Admin/OrdersPages/Orderpage.php' => app_path('Livewire/Admin/OrdersPages/Orderpage.php'),
            __DIR__ . '/../app/Livewire/Admin/OrdersPages/Orders.php' => app_path('Livewire/Admin/OrdersPages/Orders.php'),


            // pyments methods
            __DIR__ . '/../app/Livewire/Admin/PaymentsMethods/PaymentsMethodsCreate.php' => app_path('Livewire/Admin/PaymentsMethods/PaymentsMethodsCreate.php'),
            __DIR__ . '/../app/Livewire/Admin/PaymentsMethods/PaymentsMethodsEdite.php' => app_path('Livewire/Admin/PaymentsMethods/PaymentsMethodsEdite.php'),
            __DIR__ . '/../app/Livewire/Admin/PaymentsMethods/PaymentsMethods.php' => app_path('Livewire/Admin/PaymentsMethods/PaymentsMethods.php'),

            // products

            __DIR__ . '/../app/Livewire/Admin/Products/Productinfo.php' => app_path('Livewire/Admin/Products/Productinfo.php'),
            __DIR__ . '/../app/Livewire/Admin/Products/Productedit.php' => app_path('Livewire/Admin/Products/Productedit.php'),
            __DIR__ . '/../app/Livewire/Admin/Products/Productecreate.php' => app_path('Livewire/Admin/Products/Productecreate.php'),

            //settings
            __DIR__ . '/../app/Livewire/Admin/Setting/ApiConfigration.php' => app_path('Livewire/Admin/Setting/ApiConfigration.php'),

            // shipping
            __DIR__ . '/../app/Livewire/Admin/Shipping/Shippingoverview.php' => app_path('Livewire/Admin/Shipping/Shippingoverview.php'),
            __DIR__ . '/../app/Livewire/Admin/Shipping/Shippingedit.php' => app_path('Livewire/Admin/Shipping/Shippingedit.php'),
            __DIR__ . '/../app/Livewire/Admin/Shipping/Shippingcreate.php' => app_path('Livewire/Admin/Shipping/Shippingcreate.php'),

            // user profile
            __DIR__ . '/../app/Actions/UpdateProfileInformationData.php' => app_path('Actions/UpdateProfileInformationData.php'),

            /**
             * user pages
             */

            // checkout
            __DIR__ . '/../app/Livewire/CheckoutPages/Addresses.php' => app_path('Livewire/CheckoutPages/Addresses.php'),
            __DIR__ . '/../app/Livewire/CheckoutPages/CartItems.php' => app_path('Livewire/CheckoutPages/CartItems.php'),
            __DIR__ . '/../app/Livewire/CheckoutPages/Checkout.php' => app_path('Livewire/CheckoutPages/Checkout.php'),
            __DIR__ . '/../app/Livewire/CheckoutPages/PaymentsMethods.php' => app_path('Livewire/CheckoutPages/PaymentsMethods.php'),
            __DIR__ . '/../app/Livewire/CheckoutPages/Register.php' => app_path('Livewire/CheckoutPages/Register.php'),
            __DIR__ . '/../app/Livewire/CheckoutPages/ShippingMethods.php' => app_path('Livewire/CheckoutPages/ShippingMethods.php'),

            // OrderPages
            __DIR__ . '/../app/Livewire/OrderPages/OrderDetails.php' => app_path('Livewire/OrderPages/OrderDetails.php'),
            __DIR__ . '/../app/Livewire/OrderPages/OrderHistory.php' => app_path('Livewire/OrderPages/OrderHistory.php'),

            //ProductsPages

            __DIR__ . '/../app/Livewire/ProductsPages/Productdetails.php' => app_path('Livewire/ProductsPages/Productdetails.php'),
            __DIR__ . '/../app/Livewire/ProductsPages/Products.php' => app_path('Livewire/ProductsPages/Products.php'),

            // shopcart

            __DIR__ . '/../app/Livewire/ShopCart/Cartcounter.php' => app_path('Livewire/ShopCart/Cartcounter.php'),
            __DIR__ . '/../app/Livewire/ShopCart/ShopCartItems.php' => app_path('Livewire/ShopCart/ShopCartItems.php'),

            // logout
            __DIR__ . '/../app/Livewire/Logout.php' => app_path('Livewire/Logout.php'),

        ], 'CMS-Livewire-components');


        $this->publishes([
            __DIR__.'/../resources/views/errors/400.blade.php' => resource_path('views/errors/400.blade.php'),
            __DIR__.'/../resources/views/errors/401.blade.php' => resource_path('views/errors/401.blade.php'),
            __DIR__.'/../resources/views/errors/403.blade.php' => resource_path('views/errors/403.blade.php'),
            __DIR__.'/../resources/views/errors/404.blade.php' => resource_path('views/errors/404.blade.php'),
            __DIR__.'/../resources/views/errors/419.blade.php' => resource_path('views/errors/419.blade.php'),
            __DIR__.'/../resources/views/errors/429.blade.php' => resource_path('views/errors/429.blade.php'),
            __DIR__.'/../resources/views/errors/500.blade.php' => resource_path('views/errors/500.blade.php'),
            __DIR__.'/../resources/views/errors/503.blade.php' => resource_path('views/errors/503.blade.php'),
            __DIR__.'/../resources/views/errors/layout.blade.php' => resource_path('views/errors/layout.blade.php'),
            __DIR__.'/../resources/views/errors/minimal.blade.php' => resource_path('views/errors/minimal.blade.php'),
        ], 'CMS-errors');
        $this->publishes([

            /**
             * admin pages
             */
            // category
            __DIR__ . '/../resources/views/livewire/admin/category/categorycreate.blade.php' => resource_path('views/livewire/admin/category/categorycreate.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/category/categoryedit.blade.php' => resource_path('views/livewire/admin/category/categoryedit.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/category/categoryoverview.blade.php' => resource_path('views/livewire/admin/category/categoryoverview.blade.php'),

            // coupons
            __DIR__ . '/../resources/views/livewire/admin/coupons/couponcreate.blade.php' => resource_path('views/livewire/admin/coupons/couponcreate.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/coupons/couponedit.blade.php' => resource_path('views/livewire/admin/coupons/couponedit.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/coupons/couponsoverview.blade.php' => resource_path('views/livewire/admin/coupons/couponsoverview.blade.php'),

            // customers
            __DIR__ . '/../resources/views/livewire/admin/customers/customerstable.blade.php' => resource_path('views/livewire/admin/customers/customerstable.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/customers/customerscreate.blade.php' => resource_path('views/livewire/admin/customers/customerscreate.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/customers/customersedit.blade.php' => resource_path('views/livewire/admin/customers/customersedit.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/customers/info/addresinfo.blade.php' => resource_path('views/livewire/admin/customers/info/addresinfo.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/customers/info/customerinfo.blade.php' => resource_path('views/livewire/admin/customers/info/customerinfo.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/customers/info/editgegevens.blade.php' => resource_path('views/livewire/admin/customers/info/editgegevens.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/customers/info/userinfo.blade.php' => resource_path('views/livewire/admin/customers/info/userinfo.blade.php'),

            // dashboard
            __DIR__ . '/../resources/views/livewire/admin/dashboard/dashboard.blade.php' => resource_path('views/livewire/admin/dashboard/dashboard.blade.php'),


            // email
            __DIR__ . '/../resources/views/livewire/admin/email/emailcreate.blade.php' => resource_path('views/livewire/admin/email/emailcreate.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/email/emailedit.blade.php' => resource_path('views/livewire/admin/email/emailedit.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/email/emailinfo.blade.php' => resource_path('views/livewire/admin/email/emailinfo.blade.php'),


            // ordersemail

            __DIR__ . '/../resources/views/livewire/admin/ordersemail/ordermailcreate.blade.php' => resource_path('views/livewire/admin/ordersemail/ordermailcreate.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/ordersemail/ordermailinfo.blade.php' => resource_path('views/livewire/admin/ordersemail/ordermailinfo.blade.php'),

            // orders pages
            __DIR__ . '/../resources/views/livewire/admin/orders-pages/orderitems.blade.php' => resource_path('views/livewire/admin/orders-pages/orderitems.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/orders-pages/orderpage.blade.php' => resource_path('views/livewire/admin/orders-pages/orderpage.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/orders-pages/orders.blade.php' => resource_path('views/livewire/admin/orders-pages/orders.blade.php'),


            // pyments methods

            __DIR__ . '/../resources/views/livewire/admin/payments-methods/payments-methods-create.blade.php' => resource_path('views/livewire/admin/payments-methods/payments-methods-create.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/payments-methods/payments-methods-edite.blade.php' => resource_path('views/livewire/admin/payments-methods/payments-methods-edite.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/payments-methods/payments-methods.blade.php' => resource_path('views/livewire/admin/payments-methods/payments-methods.blade.php'),

            // products
            __DIR__ . '/../resources/views/livewire/admin/products/productecreate.blade.php' => resource_path('views/livewire/admin/products/productecreate.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/products/productedit.blade.php' => resource_path('views/livewire/admin/products/productedit.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/products/productinfo.blade.php' => resource_path('views/livewire/admin/products/productinfo.blade.php'),

            // settings
            __DIR__ . '/../resources/views/livewire/admin/setting/api-configration.blade.php' => resource_path('views/livewire/admin/setting/api-configration.blade.php'),

            // shipping
            __DIR__ . '/../resources/views/livewire/admin/shipping/shippingoverview.blade.php' => resource_path('views/livewire/admin/shipping/shippingoverview.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/shipping/shippingedit.blade.php' => resource_path('views/livewire/admin/shipping/shippingedit.blade.php'),
            __DIR__ . '/../resources/views/livewire/admin/shipping/shippingcreate.blade.php' => resource_path('views/livewire/admin/shipping/shippingcreate.blade.php'),

            // user profile
            __DIR__ . '/../resources/views/profile/update-profile-info-data.blade.php' => resource_path('views/profile/update-profile-info-data.blade.php'),

            /**
             * user pages
             */

            // checkout
            __DIR__ . '/../resources/views/livewire/checkout-pages/addresses.blade.php' => resource_path('views/livewire/checkout-pages/addresses.blade.php'),
            __DIR__ . '/../resources/views/livewire/checkout-pages/cart-items.blade.php' => resource_path('views/livewire/checkout-pages/cart-items.blade.php'),
            __DIR__ . '/../resources/views/livewire/checkout-pages/checkout.blade.php' => resource_path('views/livewire/checkout-pages/checkout.blade.php'),
            __DIR__ . '/../resources/views/livewire/checkout-pages/payments-methods.blade.php' => resource_path('views/livewire/checkout-pages/payments-methods.blade.php'),
            __DIR__ . '/../resources/views/livewire/checkout-pages/register.blade.php' => resource_path('views/livewire/checkout-pages/register.blade.php'),
            __DIR__ . '/../resources/views/livewire/checkout-pages/shipping-methods.blade.php' => resource_path('views/livewire/checkout-pages/shipping-methods.blade.php'),

            // order pages
            __DIR__ . '/../resources/views/livewire/order-pages/order-details.blade.php' => resource_path('views/livewire/order-pages/order-details.blade.php'),
            __DIR__ . '/../resources/views/livewire/order-pages/order-history.blade.php' => resource_path('views/livewire/order-pages/order-history.blade.php'),

            // products pages
            __DIR__ . '/../resources/views/livewire/products-pages/productdetails.blade.php' => resource_path('views/livewire/products-pages/productdetails.blade.php'),
            __DIR__ . '/../resources/views/livewire/products-pages/products.blade.php' => resource_path('views/livewire/products-pages/products.blade.php'),

            // shopcart

            __DIR__ . '/../resources/views/livewire/shop-cart/cartcounter.blade.php' => resource_path('views/livewire/shop-cart/cartcounter.blade.php'),
            __DIR__ . '/../resources/views/livewire/shop-cart/shop-cart-items.blade.php' => resource_path('views/livewire/shop-cart/shop-cart-items.blade.php'),

            // logout
            __DIR__ . '/../resources/views/livewire/logout.blade.php' => resource_path('views/livewire/logout.blade.php'),

        ], 'CMS-Livewire-views');

    }

    protected function configureCommands()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            InstallCMSCommand::class,
            CreateAdminCommand::class,
            SMTPSittingCommand::class,

        ]);
    }
    public function register()
    {

    }
}