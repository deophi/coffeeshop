<?php

namespace App\Http\Controllers;

use App\Models\{
    Rekening,
    Setting
};

use Illuminate\Http\Request;

class SettingController extends Controller{
    public function index(){
        $rekening = Rekening::all();
        $setting  = Setting::findorfail(1);
        return view('setting.index', compact('rekening', 'setting'));
    }

    public function update(Request $request, $id){
        Setting::whereId(1)->update([
            'wa' => $request->wa
        ]);
        return redirect()->back();
    }
}
