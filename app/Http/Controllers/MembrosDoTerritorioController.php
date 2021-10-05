<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\MembrosDoTerritorio;
use App\Models\Post;

class MembrosDoTerritorioController extends Controller
{
    public function index(Request $request)
    {
        $Posts = Post::where('DestinoPost', '=', 23)->simplePaginate(5);
        $membrosTerritorio = MembrosDoTerritorio::all();
        return view('telasInicio/oTerritorio/membrosDoTerritorio', ['membrosTerritorio' => $membrosTerritorio, 'posts' => $Posts]);
    }

    public function store(Request $request)
    {
        if (isset($request['btnConcluir'])) {
            foreach ($request->dadosMembro as $dado) {
                $membro = new MembrosDoTerritorio;

                $membro['Nome'] = $dado['cmpNome'];
                $membro['Sobrenome'] = $dado['cmpSobreNome'];

                $date = \DateTime::createFromFormat("Y-m-d", $dado['cmpDataNascimento']);
                $dataNascimento = $date->format("Y-m-d H:i:s");

                $membro['DataNascimento'] = $dataNascimento;
                $membro['Sexo'] = $dado['cmpSexo'];

                if (!is_null($dado['cmpEmail']))
                    $membro['Email'] = $dado['cmpEmail'];

                $telefone = preg_replace("/[^0-9]/", "", $dado['cmpTelefone']);
                $membro['Telefone'] = $telefone;

                $sucesso = $membro->save();
            }

            if ($sucesso) {
                $request->session()->flash('successMembroMunicipio', 'Membros(s) inserido(s) com sucesso!');
            } else {
                $request->session()->flash('errorMembroMunicipio', 'Erro ao inserir o(s) membros(s)!');
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function deletePublicacao(Request $request)
    {
        $posts = Post::find($request->idPost);
        Storage::delete($posts->ImgPost);
        $apagar = $posts->delete();

        if ($apagar) {
            $request->session()->flash('successDeletarMembrosDoTerritorio', 'Publicação apagada com sucesso!');
        } else {
            $request->session()->flash('errorDeletarMembrosDoTerritorio', 'Erro ao apagar a postagem!');
        }

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        if (isset($request['btnApagar'])) {
            $membro = MembrosDoTerritorio::find($request->idApagarMembroMunicipio);

            $apagar = $membro->delete();

            if ($apagar) {
                $request->session()->flash('successDeleteMembroMunicipio', 'Membro deletado com sucesso!');
            } else {
                $request->session()->flash('errorDeleteMembroMunicipio', 'Erro ao tentar deletar o membro!');
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {

        if (isset($request['btnConcluirEdicao'])) {
            $membro = MembrosDoTerritorio::find($request['cmpIdMembro']);

            if (
                isset($request['cmpNome'], $request['cmpSobreNome'], $request['cmpDataNascimento'], $request['cmpSexo'], $request['cmpTelefone'])
                && (!empty($request['cmpNome']) && !empty($request['cmpSobreNome']) && !empty($request['cmpDataNascimento']) && !empty($request['cmpSexo']) && !empty($request['cmpTelefone']) && !empty($request['cmpNome']))
            ) {
                $membro['Nome'] = $request['cmpNome'];
                $membro['Sobrenome'] = $request['cmpSobreNome'];

                $date = \DateTime::createFromFormat("Y-m-d", $request['cmpDataNascimento']);
                $dataNascimento = $date->format("Y-m-d H:i:s");
                $membro['DataNascimento'] = $dataNascimento;

                $membro['Sexo'] = $request['cmpSexo'];
                $membro['Telefone'] = preg_replace("/[^0-9]/", "", $request['cmpTelefone']);

                $membro['Email'] = isset($request['cmpEmail']) ? $request['cmpEmail'] : null;

                $edicao = $membro->save();

                return redirect()->back()->with('msgSuccess', 'Membro alterado com sucesso!');
            } else {
                return redirect()->back()->with('msgError', 'Há campos vazios que precisam ser preenchidos!');
            }
        }
    }
}
