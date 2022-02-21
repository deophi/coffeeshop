<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class StatusOrderController extends Controller{
    public function index(){
        $order = Transaksi::where('biodata_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('proses.status', compact('order'));
    }
}