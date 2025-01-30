<?php

namespace Mosweed\mosweed_shop_cms\Commands;

use App\Models\emailconfiguratie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class SMTPSittingCommand extends Command
{
    protected $signature = 'mosweed_shop_cms:smtp_sitting';

    protected $description = 'Create a new SMTP sitting';

    public function handle()
    {
        $this->info('Creating a new SMTP sitting...');

        $host = $this->ask('What is your host?', 'smtp.gmail.com');
        $port = $this->ask('What is your port?', '587');
        $encryption = $this->ask('What is your encryption?', 'tls');
        $email_from = $this->ask('What is your email from?', 'example@gmail.com');
        $password = $this->ask('What is your password?', 'password');
        $name_from = $this->ask('What is your name from?', 'Admin');

        if ($host != null && $port != null && $encryption != null && $email_from != null && $password != null && $name_from != null) {
            $validator = Validator::make([
                'host' => $host,
                'port' => $port,
                'encryption' => $encryption,
                'email_from' => $email_from,
                'password' => $password,
                'name_from' => $name_from,
                'status' => 'Active',
            ], [
                'host' => 'required|string|max:255',
                'port' => 'required|string|max:255',
                'encryption' => 'required|string|max:255',
                'email_from' => 'required|string|email|max:255',
                'password' => 'required|string|min:8',
                'name_from' => 'required|string|max:255',
                'status' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                $this->error($validator->errors()->first());
                $this->handle();
            }

            $validator['password'] = Crypt::encryptString($validator['password']);
            if ($this->confirm("Do you wish to create SMTP sitting with host {$host}?", true)) {

                try{
                    emailconfiguratie::create($validator);
                    $this->info('SMTP sitting created successfully');
                }
                catch (\Exception $e){
                    $this->error($e->getMessage());
                    $this->handle();
                }

            } else {
                $this->warn('SMTP sitting not created');
            }

        }

        else {
            $this->error('Please fill in all fields');
            $this->handle();
        }
    }
}