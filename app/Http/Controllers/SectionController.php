<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;
use App\Models\User;


class SectionController extends Controller
{
    public function store(Request $request){
      $sectionName=$request->sectionName;
        $data= new Section ;
        $data->section_Name =$sectionName;
        $data->save();
return  to_route('Control.create') ;
      }
      // _____________________________________________
      public function create(){
        $fd=Section::all();
        return view('Control.create',['posts'=>$fd]) ;
      }
// _____________________________________________
      public function  welcome(){
        $r=Post::all();
        $fd=Section::all();
        $value = User::where('email','fat@gmail.com');
        return view('posts.welcome',['posts'=>$fd,'rr'=>$r]);
    }
// _____________________________________________
  public function  show_all($id){
    $r1=Post::where('idsection',$id);
    $rr=$r1->paginate(5);
    $fd=Section::find($id);
    return view('posts.show_all',['rr'=>$rr,'posts2'=>$fd,]);
}
public function  show($id){
  $po=Post::find($id);
  $rr= Post::where('idsection',$id)->get();
  $fd=Section::all();
$sums= Like::where('post_id',$id)->sum('print_like');
$al=Comment::where('post_id',$id)->get();
  return view('posts.show',['pos'=>$po,'posts'=>$fd,'bo'=>$rr,'op'=>$sums,'al'=>$al]);
}
}
