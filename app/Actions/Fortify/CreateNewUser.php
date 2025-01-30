<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'firstname' => ['required', 'string', 'max:255', 'regex: /^[a-zA-Z\s]*$/'],
            'lastname' => ['required', 'string', 'max:255', 'regex: /^[a-zA-Z\s]*$/'],
            'phone' => ['required', 'string', 'max:255', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'starts_with:06,+31,04'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ])->validate();

        $user = User::create([
            'name' => $input['firstname'].' '.$input['lastname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => '3',
        ]);

        $user->customer()->create([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'phonenumber' => $input['phone'],
            'email' => $input['email'],
        ]);

        return $user;

    }
}
