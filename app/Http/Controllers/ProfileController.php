<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function  list()  {
        // dd('profile list');

        $profiles=DB::table('profile')->get();
        return view('admin/profile/list', compact('profiles'));
    }
    public function  create()  {
        // dd('profile list');
        return view('admin/profile/create');
    }

    public function insert(Request $req){
        // dd($req->all());
        $image="";
        if($req->has('file')){
            $file=$req->file('file');
            $image=$file->getClientOriginalName();
            $file->move('public/profilepic/', $image);
        }

        $profile=[
            'name'=>$req->name,
            'profession'=>$req->profession,
            'description'=>$req->description,
            'fb_link'=>$req->fb_link,
            'tk_link'=>$req->tk_link,
            'linkedin_link'=>$req->linkedin_link,
            'insta_link'=>$req->insta_link,
            'image'=>$image,
           
        ];
        // dd($profile);
        DB::table('profile')->insert($profile);
        // dd('inserted');
        return redirect('profile/list');
    }

    public function edite($id){
        // dd($id);

        $profiles =DB::table('profile')->where('id', $id)->first();
        return view('admin/profile/edite', compact('profiles'));


    }

    public function update(Request $req, $id){
        
         $image="";
        if($req->has('file')){
            $file=$req->file('file');
            $image=$file->getClientOriginalName();
            $file->move('/profilepic/', $image);
        }
        else{
            $image=$req->old_file;
        }

        $profile=[
            'name'=>$req->name,
            'profession'=>$req->profession,
            'description'=>$req->description,
            'fb_link'=>$req->fb_link,
            'tk_link'=>$req->tk_link,
            'linkedin_link'=>$req->linkedin_link,
            'insta_link'=>$req->insta_link,
            'image'=>$image,
           
        ];

        DB::table('profile')->where('id',$id)->update($profile);
        return redirect('profile/list');
    }

    public function delete($id){
        // dd('delete');
        $profile= DB::table('profile')->where('id', $id)->first();
        $path = public_path('') . '/profilepic/'. $profile->image;
        // dd($path);
        if(file_exists($path) && is_file($path)){
            unlink($path);
        }
        DB::table('profile')->where('id',$id)->delete();
        // dd('deleted success');
        return back();

    }


    
    public function status($id)
    {
        $status = $_GET['status'] ?? 0;
        $check = DB::table('profile')->where('id', $id)->update(['status' => $status]);
    }
}
