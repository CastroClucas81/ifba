<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class ContatosController extends Controller
{
    public function index(Request $request)
    {
        $Posts = Post::where('DestinoPost', '=', 25)->simplePaginate(5);
        return view('telasInicio/oTerritorio/contato', ['posts' => $Posts]);
    }

    public function delete(Request $request)
    {
        $posts = Post::find($request->idPost);
        Storage::delete($posts->ImgPost);
        $apagar = $posts->delete();

        if ($apagar) {
            $request->session()->flash('successDeletarContato', 'Contato apagado com sucesso!');
        } else {
            $request->session()->flash('errorDeletarContato', 'Erro ao apagar a postagem!');
        }

        return redirect()->back();
    }
}
