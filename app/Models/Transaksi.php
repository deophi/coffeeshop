<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model{
    use HasFactory;
    protected $fillable = ['biodata_id', 'tempat_id', 'harga', 'waktu', 'status'];

    public function biodata(){
        return $this->belongsTo(Biodata::class);
    }

    public function tempat(){
        return $this->belongsTo(Tempat::class);
    }
}
