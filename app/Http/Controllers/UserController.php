<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        // dd('user list');
        $users = DB::table('users')->get();
        return view('admin.user.list', compact('users'));
    }
    public function create()
    {
        // dd('user create');
        return view('admin.user.create');
    }

    public function insert(Request $req)
    {
        // dd('insert');
        // dd($req->all());
        $image = "";
        if ($req->has('file')) {
            $file = $req->file('file');
            $image = $file->getClientOriginalName();
            $file->move('public/admin/userpic/', $image);
        }
        $user = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'phone' => $req->phone,
            'role' => $req->role,
            'image' => $image,
        ];
       
        // dd($user);
        DB::table('users')->insert($user);
        // $details = [

        //     'name' => $req->name,

        //     'email' => 'your account is created:==' . $req->email

        // ];
        // //  dd($details);
        // \Mail::to($req->email)->send(new \App\Mail\MyTestMail($details));
        // dd('user inserted');
        return redirect('user/list');
    }
    public function delete($id)
    {
        // dd('delete');
        $user = DB::table('users')->where('id', $id)->first();
        $path = public_path('') .'/admin/userpic/'. $user->image;
        // dd($path);
        if (file_exists($path) && is_file($path)) {
            unlink($path);
        }
        DB::table('users')->where('id', $id)->delete();
        // $details = [

        //     'name' => $user->name,

        //     'email' => 'your account is deleted :' . $user->email

        // ];
        // //  dd($details);
        // \Mail::to($user->email)->send(new \App\Mail\MyTestMail($details));
        return back();
    }

    public function edite($id)
    {
        // dd('edite');
        $users = DB::table('users')->where('id', $id)->first();
        return view('admin.user.edite', compact('users'));
    }
    public function update(Request $req, $id)
    {
        // dd($req->all());
        $image = "";
        if ($req->has('file')) {
            $file = $req->file('file');
            $image = $file->getClientOriginalName();
            $file->move('public/admin/userpic/', $image);
        } else {
            $image = $req->old_file;
        }
        $user = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'phone' => $req->phone,
            'role' => $req->role,
            'image' => $image,
        ];
        DB::table('users')->where('id', $id)->update($user);
        return redirect('user/list');
    }




    // status function start here 

    public function status($id)
    {
        $status = $_GET['status'] ?? 0;
        $check = DB::table('users')->where('id', $id)->update(['status' => $status]);
        $user = DB::table('users')->where('id', $id)->first();
        $details = [];
        if ($status == 0) {
            $details = [

                'name' => $user->name,

                'email' => 'your account has been activited on this =:' . $user->email

            ];
        } else {
            $details = [

                'name' => $user->name,

                'email' => 'your account has been de-activated  =:' . $user->email

            ];
        }
        \Mail::to($user->email)->send(new \App\Mail\MyTestMail($details));
        return back();
    }
}
// composer require laravel/socialite
