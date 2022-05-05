<?php

namespace App\Http\Controllers;

use App\Models\{
    Produk,
    Tempat,
    Tempat_photo
};

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            $file  = $request->file('img');
            $maxId = Tempat_photo::max('id') + 1;
            $name  = Carbon::now()->year.Carbon::now()->month.$maxId.'_'.$file->getClientOriginalName();
            $file->move('images/tempat/', $name);

            Tempat::create([
                'nama'  => $request->nama,
                'stok' => $request->stok,
            ]);

            Tempat_photo::create([
                'tempat_id' => Tempat::max('id'),
                'photo'     => $name
            ]);

            return redirect()->back()->with('tempat', 'Tempat baru berhasil ditambahkan');
        }else{

        }
    }

    public function update(Request $request, $id){
        Tempat::whereId($id)->update([
            'nama'  => $request->nama,
            'stok'  => $request->stok
        ]);

        return redirect()->route('produk.index')->with('tempat', 'Tempat berhasil diubah');
    }

    public function destroy($id){
        $tempat = Tempat::findorfail($id);
        $photo  = Tempat_photo::whereId($id)->get();

        foreach($photo as $r){
            File::delete('images/tempat/'.$r->photo);
        }

        Tempat_photo::whereId($id)->delete();
        $tempat->delete();

        return redirect()->back()->with('tempat', 'Tempat berhasil dihapus.');
    }
}
