<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller{
    public function index(){
        //
    }

    public function create(){
        //
    }

    public function store(Request $request){
        Rekening::create([
            'bank'  => $request->bank,
            'norek' => $request->norek,
            'nama'  => $request->nama
        ]);
        
        return redirect()->back()->with('tambah', 'Rekening berhasil ditambahkan.');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $item     = Rekening::findorfail($id);
        $rekening = Rekening::all();

        return view('setting.editrekening', compact('item', 'rekening'));
    }

    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
