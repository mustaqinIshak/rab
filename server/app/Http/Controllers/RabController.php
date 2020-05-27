<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rab;
use App\Barang;

class RabController extends Controller
{
    //
    public function create() {
        return view('rabs.create');
    }
    
    public function index() {
        $rabs = Rab::all();
        return view('rabs.index', ['rabs'=>$rabs]);
    }

    public function show($id) {
        $rab = Rab::findOrFail($id);
        return view('rabs.show', ['rab'=>$rab]);
    }

    public function store(Request $request){
        $request->validate([
            'noRab'=>'required',
            'nama'=>'required'
        ]);
        $rab = new Rab ([
            'noRab' => $request->get('noRab'),
            'nama' => $request->get('nama')
        ]);
        
        $rab->save();
        return redirect('/rabs')->with('mssg', 'rab berhasil dibuat');
    }

    public function update(Request $request, $id){
        $request->validate([
            'noRab'=>'required',
            'nama'=>'required'
        ]);
        $rab = Rab::findOrFail($id);
        $rab->noRab = $request->get('noRab');
        $rab->nama = $request->get('nama');
        $rab->save();

        return redirect('/rabs')->with('mssg', 'rab berhasil di update');
    }

    public function destroy($id){
        $rab = Rab::findOrFail($id);
        $rab->delete();
        return redirect('/rabs')->with('mssg', 'rab berhasil dihapus');
    }

}
