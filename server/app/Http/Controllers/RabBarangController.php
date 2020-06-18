<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Barang;
use App\Rab;
use App\RabBarang;

use PDF;

class RabBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $barang = Barang::all();
        return view('rabBarangs.create', ['barangs' => $barang, 'id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($request->ajax()){
        //     $rules = array(
        //         'rab_id'    => 'required',
        //         'barang_id' => 'required',
        //         'volume'    => 'required'
        //     );
        //     $error = validator::make($request->all(), $rules);
        //     if($error->fails()){
        //         return response()->json([
        //             'error' => $error->errors()->all()
        //         ]);
        //     }
        //      $rab_id= $request->rab_id;
        //      $volume= $request->volume;
        //      $barang_id= $request->barang_id;
        //      $totalMaterial= $request->totalMaterial;
        //      $totalJasa= $request->totalJasa;

        //       for($i = 0; $i < count($barang_id); $i++){
        //         if($totalMaterial[$i] === null){
        //             $totalMaterial[$i] = 0;
        //         };
        //         if($totalJasa[$i] === null){
        //             $totalJasa[$i] = 0;
        //         };
        //         $data = array(
        //             "rab_id"        =>  $rab_id,
        //             "barang_id"     =>  $barang_id[$i],
        //             "volume"        =>  $volume[$i],
        //             "totalMaterial" =>  $totalMaterial[$i],
        //             "totalJasa"     =>  $totalJasa[$i]
        //         );
        //         $insert_data[] = $data;
        //       };
        //       RabBarang::insert($insert_data);
        //       return response()->json([
        //           'success' => 'barang berhasil ditambahkan'
        //       ])
        // };

        $request->validate([
            'rab_id'    => 'required',
            'barang_id' => 'required',
            'volume'    => 'required'
        ]);
        
        $rab_id= $request->rab_id;
        $volume= $request->volume;
        $barang_id= $request->barang_id;
        $totalMaterial= $request->totalMaterial;
        $totalJasa= $request->totalJasa;
       
        for($i = 0; $i < count($barang_id); $i++){
            if($totalMaterial[$i] === null){
                $totalMaterial[$i] = 0;
            };
            if($totalJasa[$i] === null){
                $totalJasa[$i] = 0;
            };
            $data = array(
                "rab_id"        =>  $rab_id,
                "barang_id"     =>  $barang_id[$i],
                "volume"        =>  $volume[$i],
                "totalMaterial" =>  $totalMaterial[$i],
                "totalJasa"     =>  $totalJasa[$i]
            );
            $insert_data[] = $data;
        };

        RabBarang::insert($insert_data);

        return redirect('/rabs'.'/'.$rab_id)->with('mssg', 'barang berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showBarang($id)
    {
  
        $barang = Barang::findOrFail($id);

        return $barang;
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $rabId)
    {
        //
        $barang = RabBarang::find($id);
        $barang->delete();

        return redirect('/rabs'.'/'.$rabId)->with('mssg', 'barang berhasil dihapus');
    }

    public function cetak_pdf($id) {
        $rab = Rab::findOrFail($id);
        $barangs = Rab::findOrFail($id)->barangs()->get();
        $totalHargaMaterial = 0;
        $totalHargaJasa = 0;
        foreach($barangs as $barang){
            $totalHargaMaterial += $barang->pivot->totalMaterial;
            $totalHargaJasa += $barang->pivot->totalJasa;
        }

        // $pdf = PDF::loadview('rabs.cetak-pdf', [
        //     'rab'=>$rab, 
        //     'barangs'=>$barangs, 
        //     'totalHargaMaterial'=>$totalHargaMaterial, 
        //     'totalHargaJasa'=>$totalHargaJasa, 
        //     'totalKeseluruhan' =>$totalHargaMaterial + $totalHargaJasa
        //     ]);
        // return $pdf->download('cetak.pdf');
        return view('rabs.cetak-pdf', [
            'rab'=>$rab, 
            'barangs'=>$barangs, 
            'totalHargaMaterial'=>$totalHargaMaterial, 
            'totalHargaJasa'=>$totalHargaJasa, 
            'totalKeseluruhan' =>$totalHargaMaterial + $totalHargaJasa
            ]);
    }
}
