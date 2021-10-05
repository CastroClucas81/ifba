<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Slides;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');

        if (isset($request['btnPesquisar']) && !is_null($request['campoPesquisar'])) {
            $posts = Post::where('tituloPost', 'LIKE', '%' . $request['campoPesquisar'] . '%')
                ->orderBy('created_at', 'DESC')
                ->simplePaginate(4);
        } else {
            $posts = Post::orderBy('created_at', 'DESC')->simplePaginate(4);
        }

        $banners = Slides::where('bannerAtivo', '=', true)->get();
        $hoje = date('Y-m-d H:i:s');
        $ultimasPostagens = Post::orderBy('created_at', 'ASC')->take(5)->get();

        return view('telasInicio/inicio', ['posts' => $posts, 'banners' => $banners, 'hoje' => $hoje, 'ultimasPostagens' => $ultimasPostagens]);
    }
}
