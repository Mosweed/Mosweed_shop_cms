<?php

namespace Mosweed\mosweed_shop_cms\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdminCommand extends Command
{
    protected $signature = 'mosweed_shop_cms:create_admin';

    protected $description = 'Create a new admin user';

    public function handle()
    {

        $this->line("\033[37;44m==================================\033[0m");
        $this->line("\033[37;41m   👑 Create a New Admin User 👑  \033[0m");
        $this->line("\033[37;44m==================================\033[0m");


        $firstname = $this->ask("\033[37;44m  What is your first name? \033[0m", 'Admin');
        $lastname = $this->ask("\033[37;44m  What is your last name? \033[0m", 'User');
        $email = $this->ask("\033[37;44m What is your email? \033[0m", 'admin@admin.com');
        $password = $this->secret("\033[37;44m  Enter a secure password: \033[0m") ?? 'password';
        $phonenumber = $this->ask("\033[37;44m What is your phone number? \033[0m", '0612345678');


        if ($firstname != null && $lastname != null && $email != null && $password != null && $phonenumber != null) {
            $validator = Validator::make([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $password,
                'phonenumber' => $phonenumber,
            ], [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'phonenumber' => 'required|string|min:10|max:255|regex:/^([0-9\s\-\+\(\)]*)$/|starts_with:06,+31,04',
            ]);

            if ($validator->fails()) {


                $this->error(" \033[30;41m ❌ ".$validator->errors()->first()." \033[0m");

                //sleep(30);

                $this->handle();
            }

            $name = $firstname.' '.$lastname;

            if ($this->confirm(" \033[30;42m  Do you wish to create user {$name} with email {$email}? \033[0m", true)) {

                try{
                    $user = User::forceCreate([
                        'name' => $firstname.' '.$lastname,
                        'email' => $email,
                        'password' => Hash::make($password),
                        'role' => '1',
                        'email_verified_at' => now(),
                    ]);

                    $user->customer()->create([
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'phonenumber' => $phonenumber,
                        'email' => $email,
                    ]);

                    $this->info("\033[37;42m ✅ Admin user successfully created! \033[0m");
                }
                catch (\Exception $e){
                    $this->error($e->getMessage());
                    $this->line(" ");
                    $this->handle();
                }


            } else {
                return $this->line("\033[30;43m ⚠️ Canceling creation of Admin User! \033[0m");
            }

        }
        else{
            $this->error("\033[30;41m ❌ Please fill in all the required fields! \033[0m");
            $this->handle();
        }

    }
}