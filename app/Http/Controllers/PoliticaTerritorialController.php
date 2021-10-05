<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class PoliticaTerritorialController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::where('DestinoPost', '=', 1)->simplePaginate(5);

        return view('telasInicio/politicaTerritorial', ['posts' => $posts]);
    }

    public function delete(Request $request)
    {
        $posts = Post::find($request->idPost);
        Storage::delete($posts->ImgPost);
        $apagar = $posts->delete();

        if ($apagar) {
            $request->session()->flash('successDeletarPoliticaTerritorial', 'Evento apagado com sucesso!');
        } else {
            $request->session()->flash('errorDeletarPoliticaTerritorial', 'Erro ao apagar a postagem!');
        }

        return redirect()->back();
    }
}
