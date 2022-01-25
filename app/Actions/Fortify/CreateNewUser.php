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
        User::create([
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
            'level'    => 2,
            'photo'    => 'admin.png'
        ]);

        return Biodata::create([
            'users_id' => User::max('id'),
            'nama'     => $input['nama'],
            'jk'       => $input['jk'],
            'hp'       => $input['hp'],
            'alamat'   => $input['alamat']
        ]);
    }
}