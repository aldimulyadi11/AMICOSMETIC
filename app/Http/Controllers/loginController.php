<?php

namespace App\Http\Controllers;



use DB;
use App\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;




class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request){
        $admin = 'admin';
        $username = $request->username;
        $password = $request->password;
        $data = Kasir::where('username',$username)->first(); 

        if($username == 'admin' && $password == 'admin'){
                Session::put('nama',$admin);
                Session::put('login1',TRUE);
                return redirect('/adminDashboard');
        }
        else if($data){
            if(Hash::check($password,$data->password)){
                Session::put('kode_kasir',$data->id);
                Session::put('nama',$data->nama);
                Session::put('cabang',$data->cabang);
                Session::put('login2',TRUE);
               return redirect('/dashboard');
            }
            else{
                return redirect('login')->with('alert','Login Gagal !');
            }
        }
        else{
            return redirect('login')->with('alert','Login Gagal!');
        }
    }


}

