<?php

namespace App\Http\Controllers;

use App\Events\AddComment;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;
use LDAP\Result;

use function Laravel\Prompts\alert;

class CommentCoctroller extends Controller
{


    public function comment(Request $request,$id){

        $user_id=$request->user_id;
        $validated = $request->validate([
            'comment' => 'required|string|max:255',
        ]);
    // $comment=$request->comment;
    $comment= Comment::create([
        'comment'=>$validated['comment'],
        'post_id'=>$id,
        'user_id'=>$user_id,
    ]);
    event(new AddComment($comment));
 
    // return response()->json([
    //     'success' => true,
    //     'comment' => $comment,
    //     'message' => 'Comment added successfully'
    // ], 201);   
     return  redirect()->back();
 
      }

    // session()->forget('comment_text');
    // dd($rr->print_like);
    // return to_route('posts.show',$id);

    public function likes(Request $request, $id){
     $user_id=$request->user_id;
     $data=Like::where('post_id',$id)->where('user_id', $user_id)->first();
     if(isset($data)){
        $data->delete();

       /*  Like::where('post_id',$id)->where('user_id',$user_id)->delete(); */




     }else
     {
        Like::create([
            'user_id'=>$user_id,
            'print_like'=>1,
            'post_id'=>$id
        ]);
     }








            /* $data::where('user_id',$user_id)->first(); */



/* if(Like::where('post_id',$id)->doesntExist()){


        }
 */



return  to_route('posts.show',$id) ;

}
}
