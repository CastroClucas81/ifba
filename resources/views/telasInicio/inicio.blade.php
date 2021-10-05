@extends('layouts.app')

@section('content')

<div class="container is-fluid">
    <div class="columns">
        <div class="column is-9">
            <!-- SLIDE -->
            <div class="owl-carousel owl-theme">
                @if (isset($banners) && count($banners) > 0)
                @foreach ($banners as $banner)
                @if (strtotime($banner->DataInicio) < strtotime($banner->DataFim))
                    <div class="item">
                        <img src="{{ url('storage/'. str_replace('public/', '', $banner->EnderecoImagem)) }}" alt="">
                    </div>
                    @endif
                    @endforeach
                    @else
                    @endif
            </div>
            <br>

            <!-- CONTEÚDO -->
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <p class="title has-text-left is-size-4">
                            Públicações diárias
                        </p>
                        <hr>

                        <!-- NOTÍCIA 1-->
                        @if(count($posts) > 0)
                        @foreach ($posts as $post)
                        <div class="box cardInfo">
                            <div class="columns is-vcentered">
                                <div class="column is-3 colunaImg">
                                    <img src="{{ url('storage/'. str_replace('public/', '', $post->ImgPost)) }}">
                                </div>
                                <div class="column is-9">
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
                        <div class="column is-half is-offset-one-quarter">
                            <div class="notification is-primary">
                                Não há Publicações.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <br>

            <!-- NOTÍCIAS ANTIGAS-->
            <div class="noticiasAntigas is-fullwidth">
                @include('includes.noticiasAntigas')
            </div>
        </div>

        <!-- MENU LATERAL -->
        <div class="column">
            @include('includes.menuLateral')
        </div>
    </div>
</div>

@auth
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
            <form action="{{ route('politicaTerritorial.delete') }}" method="post">
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