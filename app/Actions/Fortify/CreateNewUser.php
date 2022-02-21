<?php

namespace App\Actions\Fortify;

use App\Models\{
    Biodata,
    User
};

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers{
    use PasswordValidationRules;

    public function create(array $input){
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        
        User::create([
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
            'level'    => 2,
            'photo'    => 'admin.png'
        ]);
        
        return Biodata::create([
            'user_id'  => User::max('id'),
            'nama'     => $input['nama'],
            'jk'       => $input['jk'],
            'hp'       => $input['hp'],
            'alamat'   => $input['alamat']
        ]);
    }
}