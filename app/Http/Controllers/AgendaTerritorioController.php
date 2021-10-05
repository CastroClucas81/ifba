<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class AgendaTerritorioController extends Controller
{
    public function index(Request $request)
    {
        $Posts = Post::where('DestinoPost', '=', 4)->simplePaginate(5);
        return view('telasInicio/agendaDoTerritorio', ['posts' => $Posts]);
    }

    public function delete(Request $request)
    {
        $posts = Post::find($request->idPost);
        Storage::delete($posts->ImgPost);
        $apagar = $posts->delete();

        if ($apagar) {
            $request->session()->flash('successDeletarAgendaDoTerritorio', 'Postagem apagada com sucesso!');
        } else {
            $request->session()->flash('errorDeletarAgendaDoTerritorio', 'Erro ao apagar a postagem!');
        }

        return redirect()->back();
    }
}
