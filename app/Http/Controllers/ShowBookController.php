<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowBookController extends Controller
{
    //
    public function book(){
        
        return view('book');
    }
    //
    public function admin(){
        
        return view('admin');
    }
}
