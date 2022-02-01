<?php

namespace App\Http\Controllers;

use Auth;
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
        return view('admin.index');
    }
}