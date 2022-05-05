<?php

namespace App\Http\Controllers;

use App\Models\{
    Biodata,
    User,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller{
    public function index(){
        return view('profil.index');
    }

    public function update(Request $request, $id){
        if($id == 1){
            User::whereId(Auth::user()->id)->update([
                'email' => $request->email
            ]);

            if($request->password != NULL){
                if($request->password == $request->repassword){
                    User::whereId(Auth::user()->id)->update([
                        'password' => Hash::make($request->password)
                    ]);
                }else{
                    return redirect()->back()->with('password', 'Password dan konfirmasi password harus sama.');
                }
            }
            return redirect()->back()->with('akun', 'Data akun berhasil diubah.');
        }else{
            Biodata::where('user_id', Auth::user()->id)->update([
                'nama'   => $request->nama,
                'hp'     => $request->hp,
                'alamat' => $request->alamat,
                'jk'     => $request->jk
            ]);
            return redirect()->back()->with('biodata', 'Data diri berhasil.');
        }
    }
}
