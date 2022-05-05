<?php

namespace App\Http\Controllers;

use App\Models\Tempat;
use App\Models\Tempat_photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhotoTempatController extends Controller{
    public function store(Request $request){
        if($request->hasFile('img')){
            $file  = $request->file('img');
            $maxId = Tempat_photo::max('id') + 1;
            $name  = Carbon::now()->year.Carbon::now()->month.$maxId.'_'.$file->getClientOriginalName();
            $file->move('images/tempat/', $name);

            Tempat_photo::create([
                'tempat_id' => $request->tempatId,
                'photo'     => $name
            ]);

            return redirect()->back()->with('upload', 'Foto Berhasil ditambahkan');
        }
    }

    public function show($id){
        $tempat = Tempat::findorfail($id);
        $item   = Tempat_photo::where('tempat_id', $id)->get();

        return view('tempat.index', compact('tempat', 'item'));
    }

    public function destroy($id){
        $item = Tempat_photo::findorfail($id);

        File::delete('images/tempat/'.$item->photo);
        $item->delete();

        return redirect()->back()->with('hapus', 'Foto berhasil dihapus.');
    }
}
