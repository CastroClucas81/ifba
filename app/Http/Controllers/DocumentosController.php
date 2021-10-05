<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;


class DocumentosController extends Controller
{
    public function index(Request $request)
    {
        $Posts = Post::where('DestinoPost', '=', 7)->simplePaginate(5);
        return view('telasInicio/documentos', ['posts' => $Posts]);
    }

    public function delete(Request $request)
    {
        $posts = Post::find($request->idPost);
        Storage::delete($posts->ImgPost);
        $apagar = $posts->delete();

        if ($apagar) {
            $request->session()->flash('successDeletarDocumento', 'Evento apagado com sucesso!');
        } else {
            $request->session()->flash('errorDeletarDocumento', 'Erro ao apagar a postagem!');
        }

        return redirect()->back();
    }
}
