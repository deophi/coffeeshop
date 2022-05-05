<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusOrderController extends Controller{
    public function index(){
        $order = Transaksi::where('biodata_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('proses.status', compact('order'));
    }

    public function update(Request $request, $id){
        Transaksi::whereId($id)->update(['status' => $request->status]);

        return redirect()->back()->with('update', 'Booking diupdate.');
    }
}
