<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    //
    public function create() {
        return view('barang.create');
    }

    public function store(){
        $barang = new Barang();

        $barang->nama = request('nama');
        $barang->satuan = request('satuan');
        $barang->material =request('material');
        $barang->jasa = request('jasa');
        $barang->keterangan = request('keterangan');

        $barang->save();

        return redirect('/barangs')->with('mssg', 'barang berhasil di input');
    }

    public function index() {
        $barangs = Barang::all();
        return view('barangs.index', ['barangs'=>$barangs]);
    } 

    public function show($id) {
        $barang = Barang::findOrFail($id);

        return view('barangs.show', ['barang'=>$barang]);
    }

    public function destroy($id) {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect('/barangs')->with('mssg', 'data berhasil di hapus');
    }
}
