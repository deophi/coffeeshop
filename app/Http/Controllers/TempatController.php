<?php

namespace App\Http\Controllers;

use App\Models\{
    Produk,
    Tempat
};

use Carbon\Carbon;
use Illuminate\Http\Request;
use File;

class TempatController extends Controller{
    public function edit($id){
        $makanan = Produk::where('jenis', 1)->get();
        $minuman = Produk::where('jenis', 2)->get();
        $tempat  = Tempat::all();
        $produk  = Tempat::findorfail($id);
        $jenis   = 3;

        return view('produk.edit', compact('makanan', 'minuman', 'tempat', 'produk', 'jenis'));
    }

    public function store(Request $request){
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = Carbon::now()->year.Carbon::now()->month.'_'.$file->getClientOriginalName();
            $file->move('images/tempat/', $name);
            
            Tempat::create([
                'nama'  => $request->nama,
                'stok' => $request->stok,
                'photo' => $name
            ]);

            return redirect()->back()->with('Tempat baru berhasil ditambahkan');
        }
    }

    public function update(Request $request, $id){
        $item = Tempat::findorfail($id);

        if ($request->hasFile('img')) {
            File::delete('images/tempat/'.$item->photo);
            
            $file = $request->file('img');
            $name = Carbon::now()->year.Carbon::now()->month.'_'.$file->getClientOriginalName();
            $file->move('images/tempat/', $name);
            
            Tempat::whereId($id)->update([
                'nama'  => $request->nama,
                'stok'  => $request->stok,
                'photo' => $name
            ]);
        }else{
            Tempat::whereId($id)->update([
                'nama'  => $request->nama,
                'stok'  => $request->stok
            ]);
        }

        return redirect()->route('produk.index')->with('ubahtempat', 'Tempat berhasil diubah');
    }

    public function destroy($id){
        $item = Tempat::findorfail($id);

        File::delete('images/tempat/'.$item->photo);
        $item->delete();

        return redirect()->back()->with('tempathapus', 'Tempat berhasil dihapus.');
    }
}