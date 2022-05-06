<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class ReportController extends Controller{
    public function index(){
        $report = Transaksi::where('status', 3)->paginate(10);
        return view('admin.report', compact('report'));
    }
}
