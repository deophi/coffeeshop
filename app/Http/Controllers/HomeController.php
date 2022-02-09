<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\{
    Transaksi,
    Transaksi_detail
};
use Illuminate\Http\Request;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware(function ($request, $next) {
            if(Auth::user()->level > 1){
                return redirect()->route('index');
            }

            return $next($request);
        });
    }
    
    public function index(){
        $transaksi = Transaksi::where('status', 0)->get();
        $pesanan   = Transaksi::where('status', 1)->orderBy('waktu', 'asc')->get();

        return view('admin.index', compact('transaksi', 'pesanan'));
    }

    public function show($id){
        $nama    = Transaksi::findorfail($id)->biodata->nama;
        $pesanan = Transaksi_detail::where('transaksi_id', $id)->get();
        return view('admin.pesanan', compact('nama', 'pesanan'));
    }
}