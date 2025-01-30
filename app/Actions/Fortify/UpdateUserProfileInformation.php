<?php

namespace App\Actions\Fortify;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Pest\ArchPresets\Custom;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input )
    {


        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255', 'regex: /^[a-zA-Z\s]*$/'],
            'lastname' => ['required', 'string', 'max:255', 'regex: /^[a-zA-Z\s]*$/'],
            'phonenumber' => ['required', 'string', 'max:255', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'starts_with:06,+31,04'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],

        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['firstname'].' '.$input['lastname'],
                'email' => $input['email'],
            ])->save();



                $custumer = Customer::where('user_id', $user->id)->first();

                $custumer->update([
                'firstname' => $input['firstname'],
                'lastname' => $input['lastname'],
                'phonenumber' => $input['phonenumber'],
                'email' => $input['email'],
            ]);
        }

        session()->flash('status', 'profile information updated!');

        return redirect()->route('profile.show');

    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input)
    {

        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();

        session()->flash('status', 'Er is een e-mail verstuurd naar het nieuwe e-mailadres. Klik op de link in de e-mail om het e-mailadres te bevestigen.');

        return redirect()->route('profile.show');
    }
}