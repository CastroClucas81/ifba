<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function store(Request $request)
{
        $nomeDestinoPost = '';
        $Postagem = new Post;

        $Postagem['DestinoPost'] = $request->destinoPost;
        $Postagem['TituloPost'] = $request->tituloPost;
        $Postagem['CorpoPost'] = $request->corpoPost;
        $Postagem['DescricaoPost'] = $request->descricaoPostagem;

        switch ($request->destinoPost) {
            case 1:
                $nomeDestinoPost = 'Política territorial';
                break;
            case 20:
                $nomeDestinoPost = 'Caracterização e histórico';
                break;
            case 21:
                $nomeDestinoPost = 'Coordenação';
                break;
            case 22:
                $nomeDestinoPost = 'Núcleo Diretivo';
                break;
            case 23:
                $nomeDestinoPost = 'Membros do território';
                break;
            case 24:
                $nomeDestinoPost = 'Municípios';
                break;
            case 25:
                $nomeDestinoPost = 'Contatos';
                break;
            case 3:
                $nomeDestinoPost = 'Agenda';
                break;
            case 4:
                $nomeDestinoPost = 'Agenda do território';
                break;
            case 5:
                $nomeDestinoPost = 'Projetos Desenvolvimento Rural';
                break;
            case 6:
                $nomeDestinoPost = 'Notícias';
                break;
            case 7:
                $nomeDestinoPost = 'Documentos';
                break;
        }

        $Postagem['NomeDestinoPost'] = $nomeDestinoPost;
        $Postagem['NomeAutorPublicacao'] = $request->autorPublicacao;

        if ($request->file('imgPost')->isValid()) {
            $request->imgPost->store('public');
            $Postagem['ImgPost'] = $request->imgPost->store('public');
            $Postagem['NomeImgPost'] = $request->file('imgPost')->getClientOriginalName();
        }

        if (isset($request->anexoPost))
            $Postagem['AnexoPost'] = $request->anexoPost;

        $sucesso = $Postagem->save();

        if ($sucesso) {
            $request->session()->flash('successCreatePost', 'Publicação criada com sucesso!');
        } else {
            $request->session()->flash('errorCreatePost', 'Erro ao criar a publicação!');
        }
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $postsEdicao = Post::where('id', '=', $request->idPostEdit)->get();
        return view('home', ['postsEdicao' => $postsEdicao]);
    }

    public function update(Request $request)
    {

        $nomeDestinoPost = '';
        $Postagem = Post::find($request->idPostUpdate);

        $Postagem['DestinoPost'] = $request->destinoPostNew;
        $Postagem['TituloPost'] = $request->tituloPost;
        $Postagem['CorpoPost'] = $request->corpoPost;
        $Postagem['DescricaoPost'] = $request->descricaoPostagemUpdate;

        switch ($request->destinoPostNew) {
            case 1:
                $nomeDestinoPost = 'Política territorial';
                break;
            case 20:
                $nomeDestinoPost = 'Caracterização e histórico';
                break;
            case 21:
                $nomeDestinoPost = 'Coordenação';
                break;
            case 22:
                $nomeDestinoPost = 'Núcleo Diretivo';
                break;
            case 23:
                $nomeDestinoPost = 'Membros do território';
                break;
            case 24:
                $nomeDestinoPost = 'Municípios';
                break;
            case 25:
                $nomeDestinoPost = 'Contatos';
                break;
            case 3:
                $nomeDestinoPost = 'Agenda';
                break;
            case 4:
                $nomeDestinoPost = 'Agenda do território';
                break;
            case 5:
                $nomeDestinoPost = 'Projetos Desenvolvimento Rural';
                break;
            case 6:
                $nomeDestinoPost = 'Notícias';
                break;
            case 7:
                $nomeDestinoPost = 'Documentos';
                break;
        }
        $Postagem['NomeDestinoPost'] = $nomeDestinoPost;
        $Postagem['NomeAutorPublicacao'] = $request->autorPublicacao;
      
        if (!is_null($request->file('imgPostNew')) && $request->file('imgPostNew')->isValid()) {
            $Postagem['ImgPost'] = $request->imgPostNew->store('public');
            $Postagem['NomeImgPost'] = $request->file('imgPostNew')->getClientOriginalName();
        } else {
            $Postagem['ImgPost'] = $request->imgPostOld;
            $Postagem['NomeImgPost'] = $request->nameImgPostOld;
        }

        if (isset($request->anexoPost))
            $Postagem['AnexoPost'] = $request->anexoPost;

        $sucesso = $Postagem->save();

        if ($sucesso) {
            $request->session()->flash('successUpdatePost', 'Publicação alterada com sucesso!');
        } else {
            $request->session()->flash('errorUpdatePost', 'Erro ao alterar a publicação!');
        }
        return redirect()->back();
    }
}
