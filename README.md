<p><img src="./logos/logo.svg" width="106" height="106" alt=" CMS"></p>


[![Latest Stable Version](https://img.shields.io/packagist/v/mosweed/mosweed_shop_cms)](https://packagist.org/packages/mosweed/mosweed_shop_cms)
[![Total Downloads](https://img.shields.io/packagist/dt/mosweed/mosweed_shop_cms)](https://packagist.org/packages/mosweed/mosweed_shop_cms)
[![License](https://img.shields.io/packagist/l/mosweed/mosweed_shop_cms)](https://packagist.org/packages/mosweed/mosweed_shop_cms)

[![GitHub stars](https://img.shields.io/github/stars/mosweed/Mosweed_shop_cms?style=social)](https://github.com/mosweed/Mosweed_shop_cms/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/mosweed/Mosweed_shop_cms?style=social)](https://github.com/mosweed/Mosweed_shop_cms/network)
[![GitHub issues](https://img.shields.io/github/issues/mosweed/Mosweed_shop_cms)](https://github.com/mosweed/Mosweed_shop_cms/issues)

<!-- rebo -->






# Introduction

In this document you will find an explanation on how to use the Mosweed CMS starter kit.

# Requirements

To use this package, you'll need:

- > Laravel framework 11
- > To use with Livewire v3
- > PHP 8.2 or higher

When installing this package, the following packages will be installed:

- > Mollie / mollie-api-php
- >	Barryvdh/laravel-dompdf : *2.1.0

# Installation

You can install the package via composer:

```shell script
    composer require Mosweed/Mosweed_shop_cms

    Php artisan mosweed_shop_cms:install
```

# Installation Process:

1. First, the required packages will be installed.
2. All necessary files will be published.
3. You will be prompted with the following questions:
    - **Do you want to install Jetstream Livewire dark?**  
      You can answer with **YES** or **NO**, but we recommend installing it.
    - **New database migrations were added. Would you like to re-run your migrations and seeders?**  
      It is best to answer **YES** if you want to set up an admin or SMTP configuration.
    - **Create a new admin:**  
      ```bash
        mosweed_shop_cms:create_admin
      ```  
      This will create an admin role, allowing you to manage the CMS.
    - **Create a new SMTP setting:**  
      ```bash
      mosweed_shop_cms:smtp_sitting
      ```  
      This will generate a new configuration, responsible for sending emails, and can also be managed in the CMS.

After these commands, the following will be automatically installed:

- `npm install`
- `npm run dev`
- `php artisan storage:link`

All old migrations, the User Model, errors folder in the view, and providers in the app will be removed.



## Credits

- [Mohmad Yazan Sweed](https://github.com/mosweed)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
