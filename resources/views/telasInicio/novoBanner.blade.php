@extends('layouts.app')

@section('content')
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-12">
            <div class="box">
                <p class="title has-text-centered">
                    Inserir Banner
                </p>
                <hr>

                @if (session('successSalvarBanner'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successSalvarBanner') }}
                </div>

                @elseif (session('errorDeletarBanner'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('errorDeletarBanner') }}
                </div>

                @elseif (session('successPublicarBanner'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successPublicarBanner') }}
                </div>
                @endif

                <div class="container">
                    <form action="{{ route('banner.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="file is-default has-name is-fullwidth">
                            <label class="file-label">
                                <input class="file-input" type="file" name="imagemBanner" id="imagemBanner" required>
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fa fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        insiria o arquivo
                                    </span>
                                </span>
                                <span class="file-name" id="file-nameImagemBanner">
                                    Formatos permitidos: <strong> jpg</strong>,<strong> jpeg</strong> ou<strong> png</strong>. O tamanho da imagem deve ser de <strong>830px / 200px</strong>.
                                </span>

                            </label>
                        </div>
                        <br>
                        <h3>Prévia da imagem aparecerá abaixo.</h3>
                        <div class="columns is-mobile is-centered">
                            <div class="column is-half">
                                <div class="box">
                                    <img name="preview" src="" alt="">
                                </div>
                            </div>
                        </div>

                        <br>
                        <button class="button is-fullwidth is-primary">Inserir</button>
                    </form>
                </div>
            </div>

            <br>
            <br>
            <div class="box">
                <p class="title has-text-centered">
                    Publicar Banner
                </p>
                <hr>
                <div class="container">
                    <form action="{{ route('banner.publicar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="columns">
                            @if (isset($banners) && count($banners) > 0)
                            @foreach ($banners as $banner)
                            <div class="column is-one-quarter">
                                <div class="box">
                                    <figure class="image is-5by4">
                                        <img src="{{ url('storage/'. str_replace('public/', '', $banner->EnderecoImagem)) }}" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                                    </figure>
                                    <label class="checkbox">
                                        @if ($banner->bannerAtivo == true)
                                        <input type="checkbox" name="idImagem[]" value="{{$banner->id}}" checked>
                                        @else
                                        <input type="checkbox" name="idImagem[]" value="{{$banner->id}}">
                                        @endif

                                        Ativar Banner
                                    </label>
                                    <br>
                                    <br>
                                    <button class="button is-danger is-fullwidth" type="submit" name="excluirBanner" value="{{$banner->id}}">Excluir Banner</button>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>


                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Data Início</label>
                                    <div class="control">
                                        <input class="input" type="date" name="DataInicio" id="DataInicio" placeholder="Text input">
                                        <p class="help is-success">Refere-se a data inicial que o banner será exibido.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="column is-6">
                                <div class="field">
                                    <label class="label">Data Fim</label>
                                    <div class="control">
                                        <input class="input" type="date" name="DataFim" id="DataFim" placeholder="Text input">
                                        <p class="help is-success">Refere-se ao último dia que o banner estará visível</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="button is-fullwidth is-primary" type="submit">Publicar Banners</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>

<script src="js/banner.js"></script>
@endsection