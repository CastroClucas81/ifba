<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Municipios;
use App\Models\Post;

class MunicipiosController extends Controller
{
    public function index(Request $request)
    {
        $Posts = Post::where('DestinoPost', '=', 24)->get();
        $municipios = Municipios::all();
        return view('telasInicio/oTerritorio/municipios', ['municipios' => $municipios, 'posts' => $Posts]);
    }

    public function store(Request $request)
    {


        if (isset($request['btnConcluir'])) {

            foreach ($request->dadosMunicipio as $dado) {
                $Municipio = new Municipios;
                $Municipio['NomeMunicipio'] = $dado['cmpNomeMunicipio'];
                $Municipio['SiglaEstado'] = $dado['cmpSiglaEstado'];
                $sucesso = $Municipio->save();
            }


            if ($sucesso) {
                $request->session()->flash('successCreateMunicipio', 'Município(s) inserido(s) com sucesso!');
            } else {
                $request->session()->flash('errorCreateMunicipio', 'Erro ao inserir o(s) município(s)!');
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
            $request->session()->flash('successDeletarMunicipio', 'Publicação apagada com sucesso!');
        } else {
            $request->session()->flash('errorDeletarMunicipio', 'Erro ao apagar a postagem!');
        }

        return redirect()->back();
    }

    public function delete(Request $request)
    {

        if (isset($request['btnApagar'])) {
            $Municipio = Municipios::find($request->idApagarMunicipio);

            $apagar = $Municipio->delete();

            if ($apagar) {
                $request->session()->flash('successDeleteMunicipio', 'Município deletado com sucesso!');
            } else {
                $request->session()->flash('errorDeleteMunicipio', 'Erro ao tentar deletar o município!');
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        if (isset($request['btnConcluirEdicao'])) {
            $Municipios = Municipios::find($request->idMunicipio);

            $Municipios['NomeMunicipio'] = $request->cmpNomeMunicipio;
            $Municipios['SiglaEstado'] = $request->cmpSiglaEstado;

            $edicao = $Municipios->save();

            if ($edicao) {
                $request->session()->flash('successEditMunicipio', 'Município editado com sucesso!');
            } else {
                $request->session()->flash('errorEditMunicipio', 'Erro ao editar o município!');
            }

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
