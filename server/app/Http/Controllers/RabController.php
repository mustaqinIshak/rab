<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RabController extends Controller
{
    //
    public function create() {
        return view('rabs/create');
    }
    public function index() {
        return view('index');
    }

    public function show($id) {
        return view('rabs/$(id)');
    }

}
