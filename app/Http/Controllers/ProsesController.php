<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProsesController extends Controller{
    public function index(){
        $cart = Cart::where('biodata_id', Auth::user()->id)->get();
        
        return view('proses.index', compact('cart'));
    }
}
