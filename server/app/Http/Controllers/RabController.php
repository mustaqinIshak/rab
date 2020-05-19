<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rab;

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
        
        
    }

    public function store(Request $requset){
        $request->validate([
            ''
        ]);   
    }

    public function edit($id){

    }

    public function update(Request $requset, $id){

    }

    public function destroy($id){

    }

}
