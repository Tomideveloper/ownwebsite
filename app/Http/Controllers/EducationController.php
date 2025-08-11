<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function list(){
        // dd('list');
        $educations =DB::table('educations')->get();
        return view('admin.education.list', compact('educations'));
    }


    public function create(){
        // dd('create');
        return view('admin/education/create');
    }

    public function insert(Request $req){
        // dd($req->all());
          $educ=[
            'title'=>$req->title,
            'time'=>$req->time,
            'description'=>$req->description,
        ];
        DB::table('educations')->insert($educ);
        return redirect('education/list');
        // dd('inserted');
    }

       public function status($id)
    {
        $status = $_GET['status'] ?? 0;
        $check = DB::table('educations')->where('id', $id)->update(['status' => $status]);
    }

     public function edite($id) {
        // dd('edit'); 
        $educations=DB::table('educations')->where('id',$id)->first();
        return view('admin/education/edite',compact('educations'));
    }

     public function  update(Request $req, $id){
        // dd($req->all());
            $educ=[
            'title'=>$req->title,
            'time'=>$req->time,
            'description'=>$req->description,
        ];
        DB::table('educations')->where('id',$id)->update($educ);
        // dd('inserted');
         return redirect('education/list');
        
    }

    public function delete($id){
        // dd('dletee');
        DB::table('educations')->where('id', $id)->delete();
        return back();
    }
}
