<?php

namespace App\Http\Controllers;

use App\Models\{
    Cart,
    Tempat,
    Transaksi,
    Transaksi_detail
};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class ProsesController extends Controller{
    public function index(){
        $cart   = Cart::where('user_id', Auth::user()->id)->get();
        $tempat = Tempat::all();

        return view('proses.index', compact('cart', 'tempat'));
    }

    public function cekTempat(Request $request){
        $cart      = Cart::where('user_id', Auth::user()->id)->get();
        $tempat    = Tempat::all();
        $tgl       = $request->tgl;
        $jam       = $request->jam;
        
        return view('proses.cekTempat', compact('cart', 'tempat', 'tgl', 'jam'));
    }

    public function store(Request $request){
        $total = 0;
        $cart  = Cart::where('user_id', Auth::user()->id)->get();
        $tgl   = Carbon::parse($request->tgl)->format('Y-m-d').' '.$request->jam;

        foreach($cart as $r){
            $total = $total + $r->produk->harga * $r->jumlah;
        }

        Transaksi::create([
            'biodata_id' => Auth::user()->id,
            'tempat_id'  => $request->tempat,
            'waktu'      => $tgl,
            'harga'      => $total
        ]);

        $transaksi_id = Transaksi::select('id')->orderBy('id', 'desc')->first()->id;

        foreach($cart as $r){
            Transaksi_detail::create([
                'transaksi_id' => $transaksi_id,
                'produk_id'    => $r->produk_id,
                'jumlah'       => $r->jumlah
            ]);
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('checkout.show', $transaksi_id);
    }

    public function show($id){
        $transaksi = Transaksi::findorfail($id);
        return view('proses.pembayaran', compact('transaksi'));
    }

    public function update(Request $request, $id){
        Transaksi::whereId($id)->update(['status' => $request->status]);
        
        return redirect()->back()->with('update', 'Booking diupdate.');
    }

    public function destroy($id){
        Transaksi::destroy($id);

        return redirect()->back()->with('delete', 'Pemesanan ditolak.');
    }
}