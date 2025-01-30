<?php

namespace App\Livewire\Admin\Email;

use App\Events\EmailSettings;
use App\Models\emailconfiguratie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Emailinfo extends Component
{
    #[Layout('components.admin')]
    public $emailConfigurations;

    public $searchTerm;

    public function mount()
    {
        $this->emailConfigurations = EmailConfiguratie::all();

    }

    public function deleteEmailConfiguration($id)
    {

        $emailConfiguration = EmailConfiguratie::find($id);
        if ($emailConfiguration) {
            $emailConfiguration->delete();
        }

        // Retrieve all email configurations
        $this->emailConfigurations = EmailConfiguratie::all();

        // Check if any configurations exist
        if ($this->emailConfigurations->isNotEmpty()) {
            // Check if the configuration with ID 1 exists
            $defaultConfiguration = EmailConfiguratie::find(1);
            if ($defaultConfiguration) {
                // Set all configurations to Inactive
                EmailConfiguratie::query()->update(['status' => 'Inactive']);

                // Set the configuration with ID 1 to Active
                $defaultConfiguration->status = 'Active';
                $defaultConfiguration->save();

                event(new EmailSettings($defaultConfiguration));

            }
            $this->emailConfigurations = EmailConfiguratie::all();

            return redirect()->route('admin.show.emailconfiguratie');
        }
    }

    public function activeEmailConfiguration($id)
    {
        $emailConfiguration = EmailConfiguratie::find($id);
        if ($emailConfiguration) {
            // Set all other email configurations to Inactive
            EmailConfiguratie::where('id', '!=', $id)->update(['status' => 'Inactive']);

            // Update the selected email configuration to Active
            $emailConfiguration->status = 'Active';
            $emailConfiguration->save();

            event(new EmailSettings($emailConfiguration));

        }
        $this->emailConfigurations = EmailConfiguratie::all();

    }

    protected function updateEnvVariable($key, $value)
    {
        $path = base_path('.env');

        if (File::exists($path)) {
            $envContent = File::get($path);
            $pattern = "/^{$key}=.*/m";

            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, "{$key}={$value}", $envContent);
            } else {
                $envContent .= "\n{$key}={$value}";
            }

            File::put($path, $envContent);

            // Log the update for debugging purposes
            Log::info("Updated .env file: {$key}={$value}");
        }
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $this->emailConfigurations = EmailConfiguratie::where('name_from', 'like', $searchTerm)
            ->orWhere('name_from', 'email_from', 'host', 'like', $searchTerm)
            ->get();

        return view('livewire.admin.email.emailinfo', ['emailConfigurations' => $this->emailConfigurations]);
    }
}
