<?php

namespace App\Http\Controllers;

use App\Models\{
    Rekening,
    Setting
};
use Illuminate\Http\Request;

class RekeningController extends Controller{
    public function store(Request $request){
        Rekening::create([
            'bank'  => $request->bank,
            'norek' => $request->norek,
            'nama'  => $request->nama
        ]);
        
        return redirect()->back()->with('tambah', 'Rekening berhasil ditambahkan.');
    }

    public function edit($id){
        $item     = Rekening::findorfail($id);
        $rekening = Rekening::all();
        $setting  = Setting::findorfail(1);

        return view('setting.edit', compact('item', 'rekening', 'setting'));
    }

    public function update(Request $request, $id){
        Rekening::whereId($id)->update([
            'bank'  => $request->bank,
            'norek' => $request->norek,
            'nama'  => $request->nama
        ]);
        return redirect()->route('setting.index');
    }

    public function destroy($id){
        Rekening::whereId($id)->delete();
        return redirect()->back()->with('hapus', 'Rekening berhasil dihapus.');
    }
}
