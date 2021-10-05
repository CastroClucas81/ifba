<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class ProjetosDesenvolvimentoRuralController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::where('DestinoPost', '=', 5)->simplePaginate(5);
        return view('telasInicio/projetosDesenvolvimentoRural', ['posts' => $posts]);
    }

    public function delete(Request $request)
    {
        $posts = Post::find($request->idPost);
        Storage::delete($posts->ImgPost);
        $apagar = $posts->delete();

        if ($apagar) {
            $request->session()->flash('successDeletarProjetosDesenvolvimentoRural', 'Evento apagado com sucesso!');
        } else {
            $request->session()->flash('errorDeletarProjetosDesenvolvimentoRural', 'Erro ao apagar a postagem!');
        }

        return redirect()->back();
    }
}
