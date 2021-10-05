@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-12">
            <div class="box">

                @auth
                <p class="title has-text-centered">
                    Adicionar novos municípios
                </p>
                <hr>

                @if (session('successDeletarMunicipio'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successDeletarMunicipio') }}
                </div>
                @elseif (session('errorDeletarMunicipio'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorDeletarMunicipio') }}
                </div>
                @endif

                @if (session('successCreateMunicipio'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successCreateMunicipio') }}
                </div>
                @elseif (session('errorCreateMunicipio'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorCreateMunicipio') }}
                </div>
                @endif

                @if (session('successDeleteMunicipio'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successDeleteMunicipio') }}
                </div>
                @elseif (session('errorDeleteMunicipio'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorDeleteMunicipio') }}
                </div>
                @endif

                @if (session('successEditMunicipio'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successEditMunicipio') }}
                </div>
                @elseif (session('errorEditMunicipio'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorEditMunicipio') }}
                </div>
                @endif

                <div class="container">
                    <form method="post" action="{{ route('municipios.store') }}">
                        @csrf
                        <div class="field">
                            <label class="label">Nome do município</label>
                            <div class="field has-addons">
                                <input class="input is-fullwidth is-uppercase" type="text" name="dadosMunicipio[0][cmpNomeMunicipio]" placeholder="Insira aqui..." required>

                                <div class="cmpEstado">
                                    <div class="select" required>
                                        <select name="dadosMunicipio[0][cmpSiglaEstado]">
                                            <option selected>Estado...</option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AP">AP</option>
                                            <option value="AM">AM</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MT">MT</option>
                                            <option value="MS">MS</option>
                                            <option value="MG">MG</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PR">PR</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP">SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
                                        </select>
                                    </div>
                                </div>

                                <button class="button is-info" type="button" id="add-campo">
                                    Adicionar
                                </button>
                            </div>
                            <p class="help">Clique em "adicionar" para incluir mais cidades.</p>
                        </div>

                        <div id="municipios">

                        </div>

                        <div class="field has-addons">
                            <button type="submit" name="btnConcluir" class="button is-primary is-fullwidth">
                                <span class="icon">
                                    <i class="fa fa-check"></i>
                                </span>
                                <span>Concluir</span>
                            </button>
                        </div>
                    </form>
                    <br>
                </div>
                <br>
                @endauth

                <p class="title has-text-centered">
                    Municípios
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
                    @if (!empty($municipios) && count($municipios) > 0)
                    <table class="table is-striped is-bordered is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th width="1100">Nome do município</th>
                                <th>Estado</th>
                                @auth
                                <th width="165"></th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($municipios as $municipio)
                            <tr>
                                <td>{{ $municipio->NomeMunicipio }}</td>
                                <td>{{ $municipio->SiglaEstado }}</td>
                                @auth
                                <td>
                                    <form action="{{ route('municipios.delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="idApagarMunicipio" value="{{ $municipio->id}}">
                                        <button type="submit" name="btnApagar" class="button is-danger is-rounded is-small">Excluir</button>
                                        <button type="button" name="btnEditar" class="button is-info is-rounded is-small" data-target="lanuchModal" id="{{$municipio->id}}" onclick="btnCarregaModalEditar(this)">Editar</button>
                                    </form>
                                </td>
                                @endauth
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="column is-half is-offset-one-quarter">
                        <div class="notification is-primary">
                            Não há Municípios cadastrados.
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@auth
@if (!empty($municipios) && count($municipios) > 0)
@foreach ($municipios as $municipio)
<div class="modal modal-fx-fadeInScale">
    <div class="modal-background"></div>
    <div class="modal-content modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Editar</p>
        </header>
        <section class="modal-card-body">

            <form method="post" action="{{ route('municipios.edit') }}" class="containerMunicipios">
                @csrf
                <div class="field">
                    <label class="label">Nome do município</label>
                    <div class="field has-addons">
                        <input type="hidden" name="idMunicipio" id="idMunicipio">
                        <input class="input is-fullwidth is-uppercase" type="text" name="cmpNomeMunicipio" id="nomeMunicipio" placeholder="Insira aqui..." required>
                        <div class="cmpEstado">
                            <div class="select" required>
                                <select name="cmpSiglaEstado" id="siglaEstado">
                                    <option selected>Estado...</option>
                                    <option value="BA">BA</option>
                                    <option value="SP">SP</option>
                                </select>
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
            <form action="{{ route('municipios.deletePostagem') }}" method="post">
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