<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempat_photo extends Model{
    use HasFactory;
    protected $fillable = [
        'tempat_id',
        'photo'
    ];

    public function Tempat(){
        return $this->belongsTo(Tempat::class);
    }
}
