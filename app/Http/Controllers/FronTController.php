<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class FronTController extends Controller
{
    public function index()
    {
        // dd('index');
        $profiles =DB::table('profile')->where('status',0)->first();
        $works =DB::table('works')->where('status',0)->get();
        $educations =DB::table('educations')->where('status',0)->get();
        return view('frontend.index', compact('profiles', 'works', 'educations'));
    }

    public function insert(Request $req){
        // dd($req->all());
        $message=[
            'name'=>$req->name,
            'email'=>$req->email,
            'message'=>$req->message,
        ];
        DB::table('messages')->insert($message);
        return back()->with('success','message sent');
    }
    // public function index(){
    //     // dd('frontend index');
    //     $heros =DB::table('hero')->get();
    //     $abouts =DB::table('about')->first();
    //     $resumes =DB::table('resume')->orderBy('id','desc')->get();
    //     $services =DB::table('services')->get();
        
    //     $skills =DB::table('skills')->where('status',0)->get();
    //     $projects =DB::table('projects')->where('status',0)->get();
    //     $blogs =DB::table('blogs')->where('status',0)->get();
    //     $contact =DB::table('contact')->first();

    //     return view('frontend.index' , compact('heros', 'abouts', 'resumes', 'services','skills', 'projects', 'blogs', 'contact'));
    // }

    // public function single($id){
    //     // dd('single');
    //     $blogs= DB::table('blogs')->where('id', $id)->first();
    //     $bloges= DB::table('blogs')->get();
    //     $comment_count= DB::table('comments')->count();
    //     $comments= DB::table('comments')->where('blog_id',$id)->get();
    //     // dd($id);
    //     return view('frontend/single', compact('blogs', 'bloges', 'comments', 'comment_count'));
    // }
    // public function message_list(){
    //     // dd('message list');
    //     $messages=DB::table('messages')->get();
    //     return view('admin.message.list', compact('messages'));
    // }
    // public function insert(Request $req){
    //     // dd($req->all());
    //     $message= [
    //         'name'=>$req->name,
    //         'email'=>$req->email,
    //         'subject'=>$req->subject,
    //         'message'=>$req->message,
    //     ];
        
    //     DB::table('messages')->insert($message);
    //     //   $details = [

    //     //     'name' => $req->name. '      sent a message',

    //     //     'email' => '(from this email:)' . $req->email,
    //     //      'subject'=>$req->subject,

    //     // ];
    //     // //  dd($details);
    //     // \Mail::to($req->email)->send(new \App\Mail\MyTestMail($details));
    //     // dd('inserte');
    //     return back();
    // }

    // public function delete($id){
    //     // dd('delete');
    //     DB::table('messages')->where('id', $id)->delete();
    //     return back();
    // }

    // public function comments_insert(Request $req){
    //     // dd($req->all());
    //     // $blog=DB::table('blogs')->first();
    //     $image="";
    //     if($req->has('file')){
    //         $file=$req->file('file');
    //         $image=$file->getClientOriginalName();
    //         $file->move('public/admin/commentpic/', $image);
    //     }

    //     $comments= [
    //         'blog_id'=>$req->blog_id,
    //         'name'=>$req->name,
    //         'email'=>$req->email,
    //         'website'=>$req->website,
    //         'comment'=>$req->comment,
    //         'image'=>$image,
    //     ];
    //     // dd($comments);
    //     DB::table('comments')->insert($comments);
    //     // dd('inserted to comment');/
    //     return back();

    // }
    // public function comment_list(){
    //     // dd('comment_list');
    //     $comments=DB::table('comments')->get();
    //     return view('admin.comment.list', compact('comments'));
    // }

    // public function comment_delete($id){
    //     $comments=DB::table('comments')->where('id', $id)->first();
    //     $path= public_path('') . 'public/admin/commentpic/'.$comments->image;

    //     if(file_exists($path) && is_file($path)){
    //         unlink($path);
    //     }
    //     DB::table('comments')->where('id',$id)->delete();
    //     return back();
    // }
}
