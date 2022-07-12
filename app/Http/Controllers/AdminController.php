<?php

namespace App\Http\Controllers;


// use DB;
// use App\Admin;
// use Illuminate\Http\Request;

use DB;
use App\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function loginForm()
    {
        return view('admin.loginForm');
    }


    public function index()
    {
        $admin = 'admin';
        if(!Session::get('login1')){
            return redirect('login');
        }else{
            Session::put('nama',$admin);
            return view('admin.dashboard',compact('nama')); 
        }
    }


    public function kasir()
    {
        $kasir = DB::table('kasirs')->join('cabangs','cabangs.kode_cabang','=','kasirs.cabang')
        ->get();
        $cabang = DB::table('cabangs')->get();
        return view('admin.manageKasir',compact('kasir','cabang'));
    }


    public function registerKasir(Request $request)
    {
        $this->validate($request, [
            'namaKasir' => 'required|min:2',
            'username' => 'required|min:4|string|unique:kasirs',
            'password' => 'required|min:6',
            'confir' => 'required|same:password',
        ]);

        DB::table('kasirs')
        ->insert([
            'nama' => $request->namaKasir,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'cabang' => $request->kodeCabang,
            'tanggal' => date('Y-m-d'),
        ]);


        return redirect('/admin/manageKasir')->with('success','Data Berhasil Ditambahkan !');
     
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    

}
// namespace App\Http\Controllers;

// use App\User;
// use App\Admin;
// use Auth;
// use DB;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// class AdminController extends Controller
// {
//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('auth:admin');
//     }

//     /**
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         return view('admin.dashboard');
//     }



//     public function users()
//     {   
//         $users = Admin::getAllUsers();
//         return view('admin.users.index', compact('users'));
//     }

//     public function edit($username)
//     {
//         $user = Admin::findUser($username);
//         return view('admin.users.edit', compact('user'));
//     }

//     public function update(Request $request, User $user)
//     {
//         $type = request('type');

//         switch ($type) {
//             case 1:
//                 return AdminController::updateDetails($request, $user);
//                 break;

//             case 2:
//                 return AdminController::updatePassword($request, $user);
//                 break;
            
//             default:
//                 return redirect()->route('admin.user.edit', $user->username);
//                 break;
//         }

        
//     }


//     public static function updateDetails(Request $request, User $user)
//     {
//         $request->validate([
//             'username' => 'required|alpha|min:6|unique:users',
//         ]);
//         $user->update($request->all());
//         return redirect()->route('admin.user.edit', $user->username);
//     }


//     public static function updatePassword(Request $request, User $user)
//     {
//         $request->validate([
//             'password' => 'required|alphanum|min:6|confirmed',
//         ]);

//         $user->update($request->all());
//         session()->flash('success', 'Password successfully updates');
//         return redirect()->route('admin.user.edit', $user->username);
//     }
//}