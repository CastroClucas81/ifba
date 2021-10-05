<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Slides;

class bannerController extends Controller
{
    public function index(Request $request)
    {
        $banners = Slides::all();
        return view('telasInicio/novoBanner', ['banners' => $banners]);
    }

    public function store(Request $request)
    {
        $slide = new Slides;

        if ($request->file('imagemBanner')->isValid()) {
            $request->imagemBanner->store('public');
            $slide['EnderecoImagem'] = $request->imagemBanner->store('public');
            $slide['NomeImagem'] = $request->file('imagemBanner')->getClientOriginalName();
            $salvarBanner = $slide->save();
        }

        if ($salvarBanner) {
            $request->session()->flash('successSalvarBanner', 'Banner inserido com sucesso!');
        } else {
            $request->session()->flash('successSalvarBanner', 'Erro ao inserir o publicação!');
        }

        return redirect()->back();
    }

    public function publicar(Request $request)
    {
        $slide = null;

        if (isset($request->excluirBanner)) {
            $this->excluirBanner($request);
        }

        $todosSlides = Slides::all();

        if (isset($request->idImagem)) {
            foreach ($todosSlides as $slide) {


                if (!in_array($slide->id, $request->idImagem)) {
                    $slide['bannerAtivo'] = false;
                    $slide['DataInicio'] = null;
                    $slide['DataFim'] = null;
                } else {
                    $dataInicio = date('Y-m-d h:i:s', strtotime($request->DataInicio));
                    $dataFim = date('Y-m-d h:i:s', strtotime($request->DataFim));
                    $slide['DataInicio'] = $dataInicio;
                    $slide['DataFim'] = $dataFim;
                    $slide['bannerAtivo'] = true;
                }

                $publicarBanner = $slide->save();

                if ($publicarBanner) {
                    $request->session()->flash('successPublicarBanner', 'Banner publicado com sucesso!');
                } else {
                    $request->session()->flash('successPublicarBanner', 'Erro ao publicar o banner!');
                }
            }
        }



        return redirect()->back();
    }

    public function excluirBanner(Request $request)
    {
        
        $slide = Slides::find($request->excluirBanner);
        Storage::delete($slide->EnderecoImagem);
        $apagarBanner = $slide->delete();

        if ($apagarBanner) {
            $request->session()->flash('errorDeletarBanner', 'Banner deletado com sucesso!');
        } else {
            $request->session()->flash('errorDeletarBanner', 'Erro deletar o banner!');
        }

        return redirect()->back();
    }
}
