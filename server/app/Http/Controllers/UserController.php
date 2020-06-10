<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
class UserController extends Controller
{
    //
    public function index () {
        if(!Session::get('login')){
            return redirect('/')->with('alert', 'Anda Harus Login');
        }
        else {
            return view('rabs.index');
        }
    }
    public function show () {
        return view('login');
    }
    public function login (Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = User::where('email', $email)->first();
        if($data){
            if(Hash::check($password, $data->password)){
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('login', TRUE);
                return redirect('/rabs');
            }
            else {
                return redirect('/')->with('alert', "email atau password anda salah");
            }
        }
        else {
            return redirect('/')->with('alert', "email atau password anda salah");
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('alert', 'anda telah logout');
    }
}
