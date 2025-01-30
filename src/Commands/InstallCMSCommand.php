<?php

namespace Mosweed\mosweed_shop_cms\Commands;

use function Laravel\Prompts\confirm;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use RuntimeException;
use Symfony\Component\Process\Process;

class InstallCMSCommand extends Command
{
    protected $signature = 'mosweed_shop_cms:install';

    protected $description = 'Install the package and publish its files with replacements';

    public function handle()
    {

        $composerFile = base_path('composer.lock');
        if (!file_exists($composerFile)) {
            $this->error('composer.lock file not found.');
        } else {
            $composerLock = json_decode(file_get_contents($composerFile), true);

            $installedPackages = array_column($composerLock['packages'], 'name');
            if (in_array("laravel/jetstream", $installedPackages)) {
                $this->info("The package laravel/jetstream is installed.");
            } else {
                $this->info("The package laravel/jetstream wil be  installed.");
                $this->runCommands(['composer require laravel/jetstream', 'php artisan jetstream:install livewire --dark']);

            }

            if (in_array("mollie/mollie-api-php", $installedPackages)) {
                $this->info("The package mollie/mollie-api-php is installed.");
            } else {
                $this->info("The package laravel/jetstream wil be  installed.");
                $this->runCommands(['composer require mollie/mollie-api-php']);

            }


            if (in_array("barryvdh/laravel-dompdf", $installedPackages)) {
                $this->info("The package barryvdh/laravel-dompdfy is installed.");
            } else {
                $this->info("The package barryvdh/laravel-dompdf wil be  installed.");
                $this->runCommands(['composer require barryvdh/laravel-dompdf:2.1.0']);

            }
        }



        $this->info('Installing the package...');

        $this->info('Publishing the package files...');


        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-lang',
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-models',
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-seeders-factories',
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-Events-and-Listeners-and-Roles-and-Controllers',
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-public',
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-storage',
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-views',
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-layouts',
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-blocks',
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-Livewire-components',
        ]);

        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-Livewire-views',
        ]);
        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-components',
        ]);

        $this->Copy_Exists_Files();

        // File::deleteDirectory(database_path('migrations'));
        $this->call('vendor:publish', [
            '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
            '--tag' => 'CMS-database',
        ]);

        if (confirm('New database migrations were added. Would you like to re-run your migrations and seeders?', true)) {

            // $this->runCommands(['php artisan migrate:fresh --seed', 'php artisan app:mollie_pyments_methods_updater']);
            // // check if migrate:fresh --seed is failed

            // if ($this->confirm('Do you want to create an admin user?', true)) {
            //     $this->call('create:admin');
            // }

            $migrateCommand = 'php artisan migrate:fresh --seed';
            $output = [];
            $returnVar = null;

            // Execute the migration command
            exec($migrateCommand, $output, $returnVar);



            $this->Update_Package();



            // Check if the migration command failed
            if ($returnVar !== 0) {
                echo "Migrations and seeders failed. Please check the error messages:\n";
                foreach ($output as $line) {
                    echo $line . "\n";
                }
            } else {
                // Run the additional command only if migrations were successful
                if ($this->confirm('Do you want to create an admin user?', true)) {
                    $this->call('mosweed_shop_cms:create_admin');
                }

                if (confirm('do you want to install SMTP sitting ?', true)) {
                    $this->call('mosweed_shop_cms:smtp_sitting');
                }
            }

        }


        $this->line("
        ██████╗  █████╗ ██╗     ███████╗███████╗████████╗██╗███╗   ██╗███████╗
        ██╔══██╗██╔══██╗██║     ██╔════╝██╔════╝╚══██╔══╝██║████╗  ██║██╔════╝
        ██████╔╝███████║██║     █████╗  █████╗     ██║   ██║██╔██╗ ██║█████╗
        ██╔═══╝ ██╔══██║██║     ██╔══╝  ██╔══╝     ██║   ██║██║╚██╗██║██╔══╝
        ██║     ██║  ██║███████╗███████╗███████╗   ██║   ██║██║ ╚████║███████╗
        ╚═╝     ╚═╝  ╚═╝╚══════╝╚══════╝╚══════╝   ╚═╝   ╚═╝╚═╝  ╚═══╝╚══════╝
        ");


        $this->line("\033[1;32m✅ mosweed_shop_cms installed successfully!\033[0m");

    }

    protected function Update_Package()
    {

        $this->runCommands(['npm install', 'npm run build']);
        $this->callSilent('storage:link');
        $this->updateEnvVariable('APP_URL', 'http://127.0.0.1:8000');

        // runCommands jetstream livewire dark

    }

    /**
     * Run the given commands.
     *
     * @param  array  $commands
     * @return void
     */
    protected function runCommands($commands)
    {
        $process = Process::fromShellCommandline(implode(' && ', $commands), null, null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            try {
                $process->setTty(true);
            } catch (RuntimeException $e) {
                $this->output->writeln('  <bg=yellow;fg=black> WARN </> ' . $e->getMessage() . PHP_EOL);
            }
        }

        $process->run(function ($type, $line) {
            $this->output->write('    ' . $line);
        });
    }

    /**
     * Update the "package.json" file.
     *
     * @param  bool  $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    protected function Copy_Exists_Files()
    {

        $files = [

            // actions
            __DIR__ . '/../../app/Actions/Fortify/CreateNewUser.php' => app_path('Actions/Fortify/CreateNewUser.php'),
            __DIR__ . '/../../app/Actions/Fortify/UpdateUserProfileInformation.php' => app_path('Actions/Fortify/UpdateUserProfileInformation.php'),
            __DIR__ . '/../../app/Actions/Jetstream/HasProfilePhoto.php' => app_path('Actions/Jetstream/HasProfilePhoto.php'),
            //providers
            __DIR__ . '/../../app/Providers/RouteServiceProvider.php' => app_path('Providers/RouteServiceProvider.php'),
            __DIR__ . '/../../app/Providers/EventServiceProvider.php' => app_path('Providers/EventServiceProvider.php'),
            __DIR__ . '/../../app/Providers/JetstreamServiceProvider.php' => app_path('Providers/JetstreamServiceProvider.php'),
            __DIR__ . '/../../app/Providers/FortifyServiceProvider.php' => app_path('Providers/FortifyServiceProvider.php'),
            __DIR__ . '/../../app/Providers/AppServiceProvider.php' => app_path('Providers/AppServiceProvider.php'),
            // bootstraps
            __DIR__ . '/../../bootstrap/app.php' => base_path('bootstrap/app.php'),
            __DIR__ . '/../../bootstrap/providers.php' => base_path('bootstrap/providers.php'),
            // models
            __DIR__ . '/../../app/Models/User.php' => app_path('Models/User.php'),
            // config
            __DIR__ . '/../../config/app.php' => config_path('app.php'),
            __DIR__ . '/../../config/fortify.php' => config_path('fortify.php'),
            __DIR__ . '/../../config/jetstream.php' => config_path('jetstream.php'),
            __DIR__ . '/../../config/livewire.php' => config_path('livewire.php'),

            __DIR__ . '/../../database/migrations/0001_01_01_000002_create_jobs_table.php' => database_path('migrations/0001_01_01_000002_create_jobs_table.php'),
            __DIR__ . '/../../database/migrations/0001_01_01_000000_create_users_table.php' => database_path('migrations/0001_01_01_000000_create_users_table.php'),
            __DIR__ . '/../../database/migrations/0001_01_01_000001_create_cache_table.php' => database_path('migrations/0001_01_01_000001_create_cache_table.php'),

            __DIR__ . '/../../database/seeders/DatabaseSeeder.php' => database_path('seeders/DatabaseSeeder.php'),
            __DIR__ . '/../../routes/admin.php' => base_path('routes/admin.php'),
            __DIR__ . '/../../routes/web.php' => base_path('routes/web.php'),
            __DIR__ . '/../../routes/errors.php' => base_path('routes/errors.php'),

            __DIR__ . '/../../resources/views/layouts/app.blade.php' => resource_path('views/layouts/app.blade.php'),
            __DIR__ . '/../../resources/views/layouts/guest.blade.php' => resource_path('views/layouts/guest.blade.php'),

            __DIR__ . '/../../resources/js/app.js' => resource_path('js/app.js'),

            __DIR__ . '/../../resources/views/auth/login.blade.php' => resource_path('views/auth/login.blade.php'),
            __DIR__ . '/../../resources/views/auth/register.blade.php' => resource_path('views/auth/register.blade.php'),
            __DIR__ . '/../../resources/views/auth/forgot-password.blade.php' => resource_path('views/auth/forgot-password.blade.php'),
            __DIR__ . '/../../resources/views/auth/reset-password.blade.php' => resource_path('views/auth/reset-password.blade.php'),
            __DIR__ . '/../../resources/views/auth/verify-email.blade.php' => resource_path('views/auth/verify-email.blade.php'),
            __DIR__ . '/../../resources/views/auth/confirm-password.blade.php' => resource_path('views/auth/confirm-password.blade.php'),
            __DIR__ . '/../../resources/views/auth/login_register.blade.php' => resource_path('views/auth/login_register.blade.php'),
            __DIR__ . '/../../resources/views/auth/two-factor-challenge.blade.php' => resource_path('views/auth/two-factor-challenge.blade.php'),
            __DIR__ . '/../../resources/views/navigation-menu.blade.php' => resource_path('views/navigation-menu.blade.php'),
            __DIR__ . '/../../resources/views/profile/show.blade.php' => resource_path('views/profile/show.blade.php'),

            __DIR__ . '/../vite.config.js' => base_path('vite.config.js'),
            __DIR__ . '/../tailwind.config.js' => base_path('tailwind.config.js'),
            __DIR__.'/../../public/favicon.ico' => public_path('favicon.ico'),

        ];

        // // // check if directory exists
        // if (! is_dir(app_path('Middleware'))) {
        //     // create the directory
        //     mkdir(app_path('Http/Middleware'), 0755, true);
        // }

        foreach ($files as $from => $to) {
            $this->info("Publishing {$from} to {$to}");

            if (File::exists($to)) {
                File::delete($to);
                File::copy($from, $to);
            } else {
                File::copy($from, $to);
            }
        }

        if (is_dir(resource_path('views/errors'))) {

            $errorfile = [
                __DIR__ . '/../../resources/views/errors/400.blade.php' => resource_path('views/errors/400.blade.php'),
                __DIR__ . '/../../resources/views/errors/401.blade.php' => resource_path('views/errors/401.blade.php'),
                __DIR__ . '/../../resources/views/errors/403.blade.php' => resource_path('views/errors/403.blade.php'),
                __DIR__ . '/../../resources/views/errors/404.blade.php' => resource_path('views/errors/404.blade.php'),
                __DIR__ . '/../../resources/views/errors/419.blade.php' => resource_path('views/errors/419.blade.php'),
                __DIR__ . '/../../resources/views/errors/429.blade.php' => resource_path('views/errors/429.blade.php'),
                __DIR__ . '/../../resources/views/errors/500.blade.php' => resource_path('views/errors/500.blade.php'),
                __DIR__ . '/../../resources/views/errors/503.blade.php' => resource_path('views/errors/503.blade.php'),
                __DIR__ . '/../../resources/views/errors/layout.blade.php' => resource_path('views/errors/layout.blade.php'),
                __DIR__ . '/../../resources/views/errors/minimal.blade.php' => resource_path('views/errors/minimal.blade.php'),
            ];
            foreach ($errorfile as $from => $to) {
                $this->info("Publishing {$from} to {$to}");

                if (File::exists($to)) {
                    File::delete($to);
                    File::copy($from, $to);
                } else {
                    File::copy($from, $to);
                }
            }
        } else {
            $this->call('vendor:publish', [
                '--provider' => "Mosweed\mosweed_shop_cms\CMSServiceProvider",
                '--tag' => 'CMS-errors',
            ]);
        }

    }

    protected function updateEnvVariable($key, $value)
    {
        $path = base_path('.env');

        if (File::exists($path)) {
            $envContent = File::get($path);
            $oldValue = env($key);

            // Check if the variable already exists
            if (strpos($envContent, "$key=") !== false) {
                // Update the existing variable
                $envContent = str_replace("$key=$oldValue", "$key=$value", $envContent);
            } else {
                // Append the variable if it does not exist
                $envContent .= "\n$key=$value";
            }

            // Write the updated content back to the .env file
            File::put($path, $envContent);
        }
    }
}