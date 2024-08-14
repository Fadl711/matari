<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;


class PostCoctroller extends Controller{

    //
    public function store(Request $request){
        $data=new Post  ;
        $title_art= $request->title_art;
        $body= $request->body;
        $note_art= $request->note_art;
        $link_note= $request->link_note;
        $typeSection= $request->typeSection;
        $idsection= $request->idsection;
        if(isset( $request->fileImg)){
          $file22 =  $request->fileImg->getClientOriginalExtension();
          $file_book = time().'.'.$file22;
          $path = "book";
          $request->fileImg->move($path,$file_book);
          $data->imgart=$file_book;
        }

        if(isset( $request->fileVid)){
          $file22 =  $request->fileVid->getClientOriginalExtension();
          $file_Vid = time().'.'.$file22;
          $path = "book";
          $request->fileVid->move($path,$file_Vid);
          $data->fileVid=$file_Vid;
        }
        else if(isset( $request->link_video)){
            function getTextBetweenWords($text, $startWord, $endWord)
  {
      $startPos = strpos($text, $startWord);
      if ($startPos === false) {
          return ''; // الكلمة البداية غير موجودة
      }
      $startPos += strlen($startWord); // تجاوز الكلمة البداية

      $endPos = strpos($text, $endWord, $startPos);
      if ($endPos === false) {
          return ''; // الكلمة النهاية غير موجودة
      }

      $length = $endPos - $startPos;
      return substr($text, $startPos, $length);
  }
            $text = $request->link_video ;
            $startWord = 'e/';
            $endWord = '?s';

            $result =getTextBetweenWords($text, $startWord, $endWord);
            $data->link_video= $result;
        }

        if(isset( $request->fileAud)){
          $file22 =$request->fileAud->getClientOriginalExtension();
          $file_aud = time().'.'.$file22;
          $path = "book";
          $request->fileAud->move($path,$file_aud);
          $data->fileAud=$file_aud;
        }
        if(isset($request->book)){
            $file_b = $request->book->getClientOriginalExtension();
            $file_book = time().'.'.$file_b;
            $path = "book";
            $request->book->move($path,$file_book);
            $data->books=$file_book;

            }
          $data->titleart=$title_art;
          $data->body=$body;
          $data->noteart=$note_art;
          $data->linknote=$link_note;
          $data->teypsection=$typeSection;
          $data->idsection=$typeSection;
          $data->save();

          /* else{
            $data->titleart=$title_art;
            $data->body=$body;
            $data->noteart=$note_art;
            $data->linknote=$link_note;
            $data->teypsection=$typeSection;
            $data->idsection=$typeSection;
          $data->save();} */



    return to_route('Control.create');

        }



      public function  create(){
          return view('posts.create');
      }
      public function  welcome(){
          return view('posts.welcome');
      }
      public function  adminCo(){
        return view('posts.adminCo');
    }

    public function storeUser(Request $request)
    {


      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        /* 'password' => ['required', 'confirmed', Rules\Password::defaults()], */
    ]);

      User::create([
        'name' => $request->name,
        'email' => $request->email,
        /* 'password' => Hash::make($request->password), */
      ]);


      return redirect(route('posts.welcome',['session'=>$request->email]));
    }
    public function destroy($id){
        $Post=Post::find($id)->delete();
        return to_route('posts.welcome');
    }
    public function edit($id){
        $post=Post::find($id);
        return view('posts.edit',['posts3'=>$post]);
    }
    public function update(Request $request , $id){
        $data=Post::find($id);
        $title_art= $request->title_art;
        $body= $request->body;
        $note_art= $request->note_art;
        $link_note= $request->link_note;
        $typeSection= $request->typeSection;

        if(isset( $request->fileImg)){
          $file22 =  $request->fileImg->getClientOriginalExtension();
          $file_book = time().'.'.$file22;
          $path = "book";
          $request->fileImg->move($path,$file_book);
          $data->update([
            'imgart'=>$file_book,
            ]);
        }

        if(isset( $request->fileVid)){
          $file22 =  $request->fileVid->getClientOriginalExtension();
          $file_Vid = time().'.'.$file22;
          $path = "book";
          $request->fileVid->move($path,$file_Vid);
$data->update([
'fileVid'=>$file_Vid,
]);
        }
        else if(isset( $request->link_video)){
            function getTextBetweenWords($text, $startWord, $endWord)
  {
      $startPos = strpos($text, $startWord);
      if ($startPos === false) {
          return ''; // الكلمة البداية غير موجودة
      }
      $startPos += strlen($startWord); // تجاوز الكلمة البداية

      $endPos = strpos($text, $endWord, $startPos);
      if ($endPos === false) {
          return ''; // الكلمة النهاية غير موجودة
      }

      $length = $endPos - $startPos;
      return substr($text, $startPos, $length);
  }
            $text = $request->link_video ;
            $startWord = 'e/';
            $endWord = '?s';

            $result =getTextBetweenWords($text, $startWord, $endWord);
            $data->update([
                'link_video'=>$result,
                ]);
        }

        if(isset( $request->fileAud)){
          $file22 =$request->fileAud->getClientOriginalExtension();
          $file_aud = time().'.'.$file22;
          $path = "book";
          $request->fileAud->move($path,$file_aud);
          $data->update([
            'fileAud'=>$file_aud,
            ]);

        }
        if(isset($request->book)){
            $file_b = $request->book->getClientOriginalExtension();
            $file_book = time().'.'.$file_b;
            $path = "book";
            $request->book->move($path,$file_book);
            $data->update([
                'books'=>$file_book,
                ]);

            }
          $data->update([
            'titleart'=>$title_art,
            'body'=>$body,
            'noteart'=>$note_art,
            'linknote'=>$link_note,
            'teypsection'=>$typeSection,
            'idsection'=>$typeSection,

          ]);

 return to_route('posts.welcome');


    }

    }
