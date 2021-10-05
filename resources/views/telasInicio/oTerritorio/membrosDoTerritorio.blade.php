@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-12">
            <div class="box">
                @if (session('successMembroMunicipio'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successMembroMunicipio') }}
                </div>
                @elseif (session('errorMembroMunicipio'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorMembroMunicipio') }}
                </div>
                @endif

                @if (session('successDeleteMembroMunicipio'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successDeleteMembroMunicipio') }}
                </div>
                @elseif (session('errorDeleteMembroMunicipio'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorDeleteMembroMunicipio') }}
                </div>
                @endif

                @if (\Session::has('msgSuccess'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ \Session::get('msgSuccess') }}
                </div>
                @endif

                @if (\Session::has('msgError'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ \Session::get('msgError') }}
                </div>
                @endif

                @auth
                <p class="title has-text-centered">
                    Adicionar novos membros
                </p>
                <hr>

                @if (session('successDeletarMembrosDoTerritorio'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successDeletarMembrosDoTerritorio') }}
                </div>
                @elseif (session('errorDeletarMembrosDoTerritorio'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorDeletarMembrosDoTerritorio') }}
                </div>
                @endif

                <div class="container">
                    <form action="{{ route('membrosDoTerritorio.store') }}" method="post">
                        @csrf
                        <div class="containerMembrosTerritorio">
                            <div class="box">
                                <div class="columns">
                                    <div class="column is-11">
                                        <div class="columns">
                                            <div class="column is-6">
                                                <label class="label">Nome</label>
                                                <div class="control has-icons-left has-icons-right">
                                                    <input class="input" type="text" name="dadosMembro[0][cmpNome]" placeholder="Insira o nome do membro aqui" required>
                                                    <span class="icon is-small is-left">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="column is-6">
                                                <div class="control has-icons-left has-icons-right">
                                                    <label class="label">Sobrenome</label>
                                                    <div class="control">
                                                        <input class="input" type="text" name="dadosMembro[0][cmpSobreNome]" placeholder="Insira o sobrenome do membro aqui" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="columns">
                                            <div class="column is-3">
                                                <label class="label">Data de Nascimento</label>
                                                <div class="control">
                                                    <input class="input" type="date" name="dadosMembro[0][cmpDataNascimento]" placeholder="Text input">
                                                </div>
                                            </div>

                                            <div class="column is-2">
                                                <label class="label">Sexo</label>
                                                <div class="control">
                                                    <div class="select is-fullwidth">
                                                        <select name="dadosMembro[0][cmpSexo]">
                                                            <option selected disabled>Selecione aqui</option>
                                                            <option value="M">Masculino</option>
                                                            <option value="F">Feminino</option>
                                                            <option value="O">Outros</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="column is-4">
                                                <label class="label">E-mail</label>
                                                <div class="control has-icons-left has-icons-right">
                                                    <input class="input is-success" type="email" name="dadosMembro[0][cmpEmail]" placeholder="Insira o seu E-mail aqui">
                                                    <span class="icon is-left">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>

                                                <p class="help is-success">Este campo não é obrigatório</p>
                                            </div>

                                            <div class="column is-3">
                                                <label class="label">N. Telefone</label>
                                                <div class="control">
                                                    <input class="input" type="text" name="dadosMembro[0][cmpTelefone]" id="cmpTelefone" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="column">
                                        <button type="button" id="btnAdicionarMembro" class="button is-info is-fullwidth btnAdicionarRemoverMembro">
                                            <span class="icon">
                                                <i class="fa fa-plus fa-2x"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="divMembroTerritorio"></div>
                        </div>
                        <div class="field is-grouped">
                            <button type="submit" name="btnConcluir" class="button is-primary is-fullwidth">
                                <span class="icon">
                                    <i class="fa fa-check"></i>
                                </span>
                                <span>Concluir</span>
                            </button>
                        </div>
                    </form>
                </div>
                <br>
                @endauth

                <p class="title has-text-centered">
                    Membros
                </p>
                <hr>

                @if(count($posts) > 0)
                @foreach ($posts as $post)
                <div class="box cardInfo">
                    <div class="columns is-vcentered">
                        <div class="column is-2 colunaImg">
                            <img src="{{ url('storage/'. str_replace('public/', '', $post->ImgPost)) }}">
                        </div>
                        <div class="column is-10">
                            <form action="{{ route('conteudo') }}" method="post">
                                @csrf
                                <input type="hidden" name="idPost" value="{{$post->id}}">
                                <button type="submit" class="btnDetalhePost">
                                    <p class="title is-uppercase">
                                        {{ $post->tituloPost }}
                                    </p>
                                    <p class="content has-text-justified">
                                        {{ $post->DescricaoPost }}
                                    </p>
                                </button>
                            </form>
                            <br>
                            <span class="tag is-primary is-medium"> {{ 'Por '. $post->NomeAutorPublicacao .' no dia '. date('d/m/Y', strtotime($post->updated_at)). ' às ' . date('h:i:s', strtotime($post->updated_at)).'.' }}</span>
                            @auth
                            <hr>
                            <div class="field is-grouped is-grouped-right">
                                <form action="{{ route('conteudo.edit') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="idPostEdit" value="{{$post->id}}">
                                    <p class="control">
                                        <button type="submit" class="button is-primary btnEditar" name="btnEditar">
                                            Editar
                                        </button>
                                    </p>
                                </form>
                                <p class="control">
                                    <button class="button is-danger showModal" data-target="lanuchModal" id="modal{{$post->id}}" onclick="btnCarregaModalDelete(this.id)" data-itemid="{{$post->id}}">
                                        Excluir
                                    </button>
                                </p>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="paginacao">
                    {!! $posts->links() !!}
                </div>
                @else
                <div class="columns">
                    <div class="column is-half is-offset-one-quarter">
                        <div class="notification is-primary">
                            Não há Publicações.
                        </div>
                    </div>
                </div>
                @endif


                <div class="container">
                    @if (!empty($membrosTerritorio) && count($membrosTerritorio) > 0)
                    <div class="table-container">
                        <table class="table is-striped is-bordered is-hoverable is-fullwidth">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th width="60">Data de Nascimento</th>
                                    <th width="30">Sexo</th>
                                    <th width="300">E-mail</th>
                                    <th width="155">Telefone</th>
                                    @auth
                                    <th width="170"></th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($membrosTerritorio as $membro)
                                <tr>
                                    <td>{{ $membro->Nome }}</td>
                                    <td>{{ $membro->Sobrenome }}</td>
                                    <td>{{ date('d/m/Y', strtotime($membro->DataNascimento)) }}</td>
                                    <td>
                                        @if ($membro->Sexo == 'M')
                                        Masculino
                                        @elseif ($membro->Sexo == 'F')
                                        Feminino
                                        @elseif ($membro->Sexo == 'O')
                                        Outros
                                        @endif
                                    </td>
                                    <td>{{ $membro->Email }}</td>
                                    <td>{{ "(".substr($membro->Telefone,0,2).") ".substr($membro->Telefone,2,-4)." - ".substr($membro->Telefone,-4)  }}</td>
                                    @auth
                                    <td>
                                        <form action="{{ route('membrosDoTerritorio.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="idApagarMembroMunicipio" value="{{$membro->id}}">
                                            <button type="submit" name="btnApagar" class="button is-danger is-rounded is-small">Excluir</button>
                                            <button type="button" name="btnEditar" class="button is-info is-rounded is-small" data-target="lanuchModal" id="{{$membro->id}}" onclick="btnCarregaModalEditarMembro(this)">Editar</button>
                                        </form>
                                    </td>
                                    @endauth
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="column is-half is-offset-one-quarter">
                        <div class="notification is-primary">
                            Não há Membros Cadastrados.
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@auth
@if (!empty($membrosTerritorio) && count($membrosTerritorio) > 0)
@foreach ($membrosTerritorio as $membro)
<div class="modal modal-fx-fadeInScale">
    <div class="modal-background"></div>
    <div class="modal-content modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Editar</p>
        </header>
        <section class="modal-card-body">
            <form method="post" action="{{ route('membrosDoTerritorio.edit') }}">
                @csrf
                <div class="field">
                    <div class="field has-addons">
                        <div class="columns">
                            <div class="column is-12">
                                <div class="columns">
                                    <input type="hidden" name="cmpIdMembro" id="cmpIdMembro">
                                    <div class="column is-6">
                                        <label class="label">Nome</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" type="text" name="cmpNome" id="cmpNome" placeholder="Insira o nome do membro aqui" required>
                                            <span class="icon is-small is-left">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="column is-6">
                                        <div class="control has-icons-left has-icons-right">
                                            <label class="label">Sobrenome</label>
                                            <div class="control">
                                                <input class="input" type="text" name="cmpSobreNome" id="cmpSobreNome" placeholder="Insira o sobrenome do membro aqui" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column is-6">
                                        <label class="label">Data de Nascimento</label>
                                        <div class="control">
                                            <input class="input" type="date" name="cmpDataNascimento" id="cmpDataNascimento" placeholder="Text input" required>
                                        </div>
                                    </div>

                                    <div class="column">
                                        <label class="label">Sexo</label>
                                        <div class="control">
                                            <div class="select is-fullwidth">
                                                <select name="cmpSexo" id="cmpSexo">
                                                    <option selected disabled>Selecione aqui</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                    <option value="O">Outros</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column is-6">
                                        <label class="label">E-mail</label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input is-success" type="email" name="cmpEmail" id="cmpEmail" placeholder="Insira o seu E-mail aqui">
                                            <span class="icon is-left">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>

                                        <p class="help is-success">Este campo não é obrigatório</p>
                                    </div>

                                    <div class="column is-6">
                                        <label class="label">N. Telefone</label>
                                        <div class="control">
                                            <input class="input" type="text" name="cmpTelefone" id="cmpTelefone" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="buttons">
                    <button type="submit" name="btnConcluirEdicao" class="button is-primary">
                        <span class="icon">
                            <i class="fa fa-check"></i>
                        </span>
                        <span>Concluir</span>
                    </button>

                    <button type="button" class="modal-button-close button closebtn">Cancelar</button>
                </p>
            </form>
        </section>
    </div>
</div>

@endforeach
@endif

@foreach ($posts as $post)
<div id="modal-fadeInScale-fs" class="modal modal-fx-fadeInScale">
    <div class="modal-background"></div>
    <div class="modal-content modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Atenção</p>
        </header>
        <section class="modal-card-body">
            <div class="content">
                Tem certeza que quer deletar esta postagem?
            </div>
        </section>
        <footer class="modal-card-foot">
            <form action="{{ route('membrosDoTerritorio.deletePostagem') }}" method="post">
                @csrf
                <input type="hidden" id="idPost" name="idPost">
                <button class="modal-button-close button is-danger telaCarregamento" type="submit">Sim</button>
            </form>
            <button class="modal-button-close button closebtn">Não</button>
        </footer>
    </div>
</div>
@endforeach
@endauth
@endsection