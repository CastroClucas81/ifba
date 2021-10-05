<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class conteudoPostController extends Controller
{
    public function index(Request $request)
    {

        $posts = Post::where('id', '=', $request->idPost)->get();
     
        return view('telasInicio/conteudoPost', ['posts' => $posts]);
    }
}
