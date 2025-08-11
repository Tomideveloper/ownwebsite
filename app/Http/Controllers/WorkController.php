<?php

namespace App\Http\Controllers;
use DB; 
use Illuminate\Http\Request;

class WorkController extends Controller

{   

    public function list(){
        // dd('list');
        $works =DB::table('works')->get();
        return view('admin/work_experience/list', compact('works'));  
    }
    public function create(){
        // dd('create work');
        return view('admin.work_experience.create');
    }

    public function  insert(Request $req){
        // dd($req->all());
        $work=[
            'education'=>$req->education,
            'date'=>$req->date,
            'description'=>$req->description,
        ];
        DB::table('works')->insert($work);
        // dd('inserted');
        return redirect('work_experience/list');
        
    }

    public function edite($id) {
        // dd('edit'); 
        $works=DB::table('works')->where('id',$id)->first();
        return view('admin/work_experience/edite',compact('works'));
    }

     public function  update(Request $req, $id){
        // dd($req->all());
        $work=[
            'education'=>$req->education,
            'date'=>$req->date,
            'description'=>$req->description,
        ];
        DB::table('works')->where('id',$id)->update($work);
        // dd('inserted');
        return redirect('work_experience/list');
        
    }
      public function status($id)
    {
        $status = $_GET['status'] ?? 0;
        $check = DB::table('works')->where('id', $id)->update(['status' => $status]);
    }

    public function delete($id){
        // dd('delete');
        DB::table('works')->where('id',$id)->delete();
        return back();


    }
}
