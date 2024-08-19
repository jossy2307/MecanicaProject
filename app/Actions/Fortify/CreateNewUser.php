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
        $dominiosPermitidos = 'gmail.com|yahoo.com|outlook.com|hotmail.com|msn.com|live.com|icloud.com|' .
            'mail.com';

        Validator::make($input, [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                'regex:/^[a-zA-Z0-9_.+-]+@(' . $dominiosPermitidos . ')$/'  // Usa la expresión regular aquí
            ],
            'password' => $this->passwordRules(),
            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'nombre' => $input['nombre'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
