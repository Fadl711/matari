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
        return view('Control.create') ;
      }
// _________________________________________
      public function  welcome(){
        return view('posts.welcome');
    }
// _____________________________________________
  public function  show_all($id){
    $post=Post::where('idsection',$id);
    $posts=$post->paginate(6);
    $section=Section::find($id);
    return view('posts.show_all',['allPost'=>$posts,'sectionFind'=>$section,]);
}
public function  show($id){
  $posts=Post::find($id);
  $rr= Post::where('idsection',$id)->get();
$sums= Like::where('post_id',$id)->sum('print_like');
$comment=Comment::where('post_id',$id)->get();
  return view('posts.show',['posts'=>$posts,'like'=>$sums,'comment'=>$comment]);
}
}
