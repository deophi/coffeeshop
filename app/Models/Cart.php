<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model{
    use HasFactory;
    protected $fillable=['biodata_id', 'produk_id', 'jumlah'];

    public function biodata(){
        return $this->belongsTo(Biodata::class);
    }

    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
