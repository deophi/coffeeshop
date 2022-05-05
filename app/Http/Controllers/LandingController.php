<?php

namespace App\Http\Controllers;

use App\Models\{
    Cart,
    Produk
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller{
    public function index(){
        $makanan = Produk::where('jenis', 1)->get();
        $minuman = Produk::where('jenis', 2)->get();

        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('landing.index', compact('cart', 'makanan', 'minuman'));
        }else{
            return view('landing.index', compact('makanan', 'minuman'));
        }
    }

    public function store(Request $req){
        // cek item cart
        $cek = Cart::where('user_id', Auth::user()->id)->where('produk_id', $req->id)->first();
        if($cek == NULL){
            Cart::create([
                'user_id'   => Auth::user()->id,
                'produk_id' => $req->id,
                'jumlah'    => $req->qty
            ]);
        }else{
            $hasil = $cek->jumlah + $req->qty;
            Cart::whereId('id', $cek->id)->update(['jumlah' => $hasil]);
        }

        return redirect()->back();
    }

    public function destroy($id){
        Cart::destroy($id);
        return redirect()->back();
    }
}
