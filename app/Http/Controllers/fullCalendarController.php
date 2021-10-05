<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class fullCalendarController extends Controller
{
    public function index(Request $request)
    {
        $entidadeEvents = Event::all();

        return response()->json($entidadeEvents);
    }

    public function store(Request $request)
    {
        $Event = new Event;

        $dataStart = str_replace('/', '-', $request->start);
        $dataStartConvertida = date("Y-m-d H:i:s", strtotime($dataStart));

        $dataEnd = str_replace('/', '-', $request->end);
        $dataEndConvertida = date("Y-m-d H:i:s", strtotime($dataEnd));

        $Event['title'] = $request->title;
        $Event['color'] = $request->color;
        $Event['start'] = $dataStartConvertida;
        $Event['end'] = $dataEndConvertida;

        $cadastro = $Event->save();

        if ($cadastro) {
            $retorno = ['situacao' => true];
            $request->session()->flash('success', 'Evento cadastrado com sucesso às ' . $request->start . '!');
        } else {
            $retorno = ['situacao' => true, 'mensagem' => 'Erro ao realizar o cadastro!'];
        }

        return response()->json($retorno);
    }

    public function edit(Request $request)
    {
        $Event = Event::find($request->id);

        $dataStart = str_replace('/', '-', $request->start);
        $dataStartConvertida = date("Y-m-d H:i:s", strtotime($dataStart));

        $dataEnd = str_replace('/', '-', $request->end);
        $dataEndConvertida = date("Y-m-d H:i:s", strtotime($dataEnd));

        $Event['title'] = $request->title;
        $Event['color'] = $request->color;
        $Event['start'] = $dataStartConvertida;
        $Event['end'] = $dataEndConvertida;

        $edicao = $Event->save();

        if ($edicao) {
            $retorno = ['situacao' => true];
            $request->session()->flash('success', 'Evento editado com sucesso!');
        } else {
            $retorno = ['situacao' => true, 'mensagem' => 'Erro ao Editar o evento!'];
        }

        return response()->json($retorno);
    }

    public function delete(Request $request)
    {

        $Event = Event::find($request->idApagar);

        $apagar = $Event->delete();

        if ($apagar) {
            $retorno = ['situacao' => true];
            $request->session()->flash('success', 'Evento apagado com sucesso!');
        } else {
            $retorno = ['situacao' => true, 'mensagem' => 'Erro ao apagar o evento!'];
        }

        return response()->json($retorno);
    }
}
