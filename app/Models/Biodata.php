<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model{
    use HasFactory;
    protected $fillable = ['users_id', 'nama', 'hp', 'alamat', 'photo'];

    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}