<?php

namespace App\Http\Controllers;

use App\Models\{
    Produk,
    Tempat
};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller{
    public function __construct(){
        $this->middleware(function ($request, $next) {
            if(Auth::user()->level > 1){
                return redirect()->route('index');
            }

            return $next($request);
        });
    }

    public function index(){
        $makanan = Produk::where('jenis', 1)->get();
        $minuman = Produk::where('jenis', 2)->get();
        $tempat  = Tempat::all();

        return view('produk.index')->with([
            'makanan' => $makanan,
            'minuman' => $minuman,
            'tempat'  => $tempat
        ]);
    }

    public function edit($id){
        $makanan = Produk::where('jenis', 1)->get();
        $minuman = Produk::where('jenis', 2)->get();
        $tempat  = Tempat::all();
        $produk  = Produk::findorfail($id);
        $jenis   = $produk->jenis;

        return view('produk.edit', compact('makanan', 'minuman', 'tempat', 'produk', 'jenis'));
    }

    public function store(Request $request){
        if ($request->i == 1) {
            $jenis = 'makanan';
            $pesan = 'makan';
        }else{
            $jenis = 'minuman';
            $pesan = 'minum';
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = Carbon::now()->year.Carbon::now()->month.'_'.$file->getClientOriginalName();
            $file->move('images/produk/', $name);

            Produk::create([
                'nama'  => $request->nama,
                'harga' => $request->harga,
                'photo' => $name,
                'jenis' => $request->i
            ]);

            return redirect()->back()->with($pesan, $jenis.' berhasil ditambahkan');
        }else{
            return redirect()->back()->with($pesan, 'Silahkan tambahkan foto '.$jenis);
        }
    }

    public function update(Request $request, $id){
        $item = Produk::findorfail($id);

        if ($item->jenis == 1) {
            $jenis = 'makanan';
            $pesan = 'makan';
        }else{
            $jenis = 'minuman';
            $pesan = 'minum';
        }

        if ($request->hasFile('img')) {
            $item = Produk::findorfail($id);
            File::delete('images/produk/'.$item->photo);

            $file = $request->file('img');
            $name = Carbon::now()->year.Carbon::now()->month.'_'.$file->getClientOriginalName();
            $file->move('images/produk/', $name);

            Produk::whereId($id)->update([
                'nama'  => $request->nama,
                'harga' => $request->harga,
                'photo' => $name
            ]);
        }else{
            Produk::whereId($id)->update([
                'nama'  => $request->nama,
                'harga' => $request->harga
            ]);
        }

        return redirect()->route('produk.index')->with($pesan, $jenis.' berhasil diubah');
    }

    public function destroy($id){
        $item = Produk::findorfail($id);

        if ($item->jenis == 1) {
            $jenis = 'makanan';
            $pesan = 'delmakan';
        }else{
            $jenis = 'minuman';
            $pesan = 'delminum';
        }

        File::delete('images/produk/', $item->photo);
        $item->delete();

        return redirect()->back()->with($pesan, $jenis.' berhasil dihapus.');
    }
}
