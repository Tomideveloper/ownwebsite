<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list(){
        // dd('list');
        $messages =DB::table('messages')->get();
        return view('admin.message.list', compact('messages'));
    }
    // public function index(){
    //     // dd('admin index');
    
          
    //    $count_message=DB::table('messages')->count();
    //    $comments=DB::table('comments')->count();
    //     return view('admin.index', compact('count_message', 'comments'));
    // }

    // public function login(){
    //     // dd('login');
        
    //     return view('login');
    // }

    // public function user_login(Request $req)
    // {
    //     // // dd('resssskskksks');
    //     // dd($req->all());
    //     $user = DB::table('users')->where('email', $req->email)->where('password', $req->password)->first();

    //     // dd($user);
    //     if (isset($user) && $user->email != "") {
    //         $role = "";
    //         if ($user->status ==0) {
    //             $role = $user->status;
    //             session()->put('check_user', 1);
    //             session()->put('check_confrim',0);
    //             return redirect('admin/index');
    //         } else {
    //             session()->flush();
    //             return back();
    //         }
    //     } else {
    //         return back();
    //     }
    // }
    //  public function signin(){
    //     // dd('signin');
    //     return view('signin');
    //  }
    // public function logout()
    // {
    //     // dd('logout');
    //     session()->flush();
    //     return redirect('login');
    // }

  

}
