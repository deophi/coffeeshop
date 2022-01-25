<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model{
    use HasFactory;
    protected $fillable = ['user_id', 'nama', 'hp', 'alamat', 'jk'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}