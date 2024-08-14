<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    if($request->ajax())

    {
    $output="";
    $products=Post::where('titleart','LIKE','%'.$request->search."%")->get();
    if($products)
    {
    foreach ($products as $product) {
    $output.='<tr class=" border border-black">'.'<td >'.
    '<a href="/posts/'.$product->id.'/show">'.$product->id.$product->titleart.'</a>'
    .'</td>'.
    '</tr>'.
    '<hr>';

    }

    return Response($output);
       }
       }
    }
}
