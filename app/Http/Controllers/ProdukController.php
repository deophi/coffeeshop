<?php

namespace App\Http\Controllers;

use App\Models\{
    Makanan,
    Minuman,
    Tempat
};
use Illuminate\Http\Request;

class ProdukController extends Controller{
    public function index(){
        $makanan = Makanan::all();
        $minuman = Minuman::all();
        $tempat  = Tempat::all();
        return view('admin.produk', compact('makanan', 'minuman', 'tempat'));
    }
}