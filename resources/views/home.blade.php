@extends('layouts.app')

@section('content')
<script src="https://cdn.tiny.cloud/1/bwbhb6ql1w96hwh5679n0z5gw155n4u89pr0flv0sarga6ty/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{ asset('js/langs/pt_BR.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

<style>
    figure.image {
        display: inline-block;
        border: 1px solid gray;
        margin: 0 2px 0 1px;
        background: #f5f2f0;
    }

    figure.align-left {
        float: left;
    }

    figure.align-right {
        float: right;
    }

    figure.image img {
        margin: 8px 8px 0 8px;
    }

    figure.image figcaption {
        margin: 6px 8px 6px 8px;
        text-align: center;
    }

    img.align-left {
        float: left;
    }

    img.align-right {
        float: right;
    }

    /* Basic styles for Table of Contents plugin (toc) */
    .mce-toc {
        border: 1px solid gray;
    }

    .mce-toc h2 {
        margin: 4px;
    }

    .mce-toc li {
        list-style-type: none;
    }
</style>


<div style="display: none;" class="grabMe">Aguarde um instante...</div>

<div class="container is-fluid">
    <div class="columns">
        <div class="column">
            <div class="box">
                <p class="title has-text-centered">
                    Nova publicação
                </p>
                <hr>

                @if (session('successCreatePost'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successCreatePost') }}
                </div>

                @elseif (session('errorCreatePost'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorCreatePost') }}
                </div>
                @endif

                @if (session('successUpdatePost'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    {{ session('successUpdatePost') }}
                </div>

                @elseif (session('errorUpdatePost'))
                <div class="notification is-danger">
                    <button class="delete"></button>
                    {{ session('errorUpdatePost') }}
                </div>
                @endif

                <div class="container">
                    @if (isset($postsEdicao) && count($postsEdicao) > 0)
                    @foreach ($postsEdicao as $postEdicao)
                    <!-- EDITAR PUBLICAÇÃO -->
                    <form action="{{ route('Posts.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idPostUpdate" value="{{$postEdicao->id}}">
                        <!-- NAME AUTHOR -->
                        <div class="field">
                            <label class="label">Nome do autor da publicação</label>
                            <div class="control">
                                <input class="input" type="text" name="autorPublicacao" id="autorPublicacao" value="{{$postEdicao->NomeAutorPublicacao}}" placeholder="Insira aqui">
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <!-- SELECT -->
                                <div class="field">
                                    <label class="label">Destino da publicação</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="destinoPostNew" id="destinoPost">
                                                <option selected value="{{ $postEdicao->DestinoPost}}">Selecionado: {{$postEdicao->NomeDestinoPost}}</option>
                                                <option value="1">Política territorial</option>
                                                <optgroup label="O território">
                                                    <option value="20">Caracterização e histórico</option>
                                                    <option value="21">Coordenação</option>
                                                    <option value="22">Núcleo Diretivo</option>
                                                    <option value="23">Membros do território</option>
                                                    <option value="24">Municípios</option>
                                                    <option value="25">Contatos</option>
                                                </optgroup>
                                                <option value="4">Agenda do território</option>
                                                <option value="5">Projetos Desenvolvimento Rural</option>
                                                <option value="6">Notícias</option>
                                                <option value="7">Documentos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="help">A publicação será postada na tela selecionada</p>
                                </div>
                            </div>

                            <div class="column is-9">
                                <!-- TITLE-->
                                <div class="field">
                                    <label class="label">Título da publicação</label>
                                    <div class="control">
                                        <input class="input" type="text" name="tituloPost" id="tituloPost" placeholder="Text input" value="{{ $postEdicao->tituloPost}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- UPLOAD IMAGE -->
                        <div class="field">
                            <label class="label">Capa da publicação</label>
                            <input type="hidden" name="nameImgPostOld" value="{{ $postEdicao->NomeImgPost }}">
                            <input type="hidden" name="imgPostOld" value="{{$postEdicao->ImgPost}}">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="imgPostNew" id="imgPost" accept="image/jpg,image/jpeg,image/png,image/bmp,image/tiff">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Escolha uma imagem...
                                        </span>
                                    </span>
                                    <span class="file-name" id="file-name">
                                        {{ $postEdicao->NomeImgPost }}
                                    </span>
                                </label>
                            </div>
                        </div>
                        <p class="help">A imagem será utilizada como capa para a sua publicação.</p>
                        <br>
                        <div class="field">
                            <label class="label">Descrição da postagem</label>
                            <textarea class="textarea" maxlength="80" rows="2" name="descricaoPostagemUpdate" placeholder="Descrição da postagem. Obs.: máximo de 80 palavras" id="field" onkeyup="countChar(this)" required>
                            {{$postEdicao->DescricaoPost}}
                            </textarea>
                            <p>
                                Carateres restantes: <strong class="charNum"></strong>
                            </p>
                        </div>
                        <!-- TEXTAREA -->
                        <div class="field">
                            <label class="label">Corpo da publicação</label>
                            <textarea id="full-featured-non-premium" name="corpoPost" required placeholder><p style="text-align: center; font-size: 15px;">
                                <?php echo html_entity_decode($postEdicao->CorpoPost) ?>
                            </textarea>
                        </div>

                        <!-- Botão publicar -->
                        <p class="buttons">
                            <button type="submit" name="btnAlterar" class="button is-medium is-primary is-fullwidth telaCarregamento">
                                <span class="icon">
                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                </span>
                                <span>Salvar edições</span>
                            </button>
                        </p>
                    </form>
                    @endforeach
                    @else

                    <!-- NOVA PUBLICAÇÃO -->
                    <form class="test" action="{{ route('Posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- NAME AUTHOR -->
                        <div class="field">
                            <label class="label">Nome do autor da publicação</label>
                            <div class="control">
                                <input class="input" type="text" name="autorPublicacao" id="autorPublicacao" placeholder="Insira aqui" required>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <!-- SELECT -->
                                <div class="field">
                                    <label class="label">Destino da publicação</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="destinoPost" id="destinoPost" required>
                                                <option disabled selected>Selecione uma opção do Dropdown</option>
                                                <option value="1">Política territorial</option>
                                                <optgroup label="O território">
                                                    <option value="20">Caracterização e histórico</option>
                                                    <option value="21">Coordenação</option>
                                                    <option value="22">Núcleo Diretivo</option>
                                                    <option value="23">Membros do território</option>
                                                    <option value="24">Municípios</option>
                                                    <option value="25">Contatos</option>
                                                </optgroup>
                                                <option value="4">Agenda do território</option>
                                                <option value="5">Projetos Desenvolvimento Rural</option>
                                                <option value="6">Notícias</option>
                                                <option value="7">Documentos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="help">A publicação será postada na tela selecionada</p>
                                </div>
                            </div>

                            <div class="column is-9">
                                <!-- TITLE-->
                                <div class="field">
                                    <label class="label">Título da publicação</label>
                                    <div class="control">
                                        <input class="input" type="text" name="tituloPost" id="tituloPost" placeholder="Insira aqui" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- UPLOAD IMAGE -->
                        <div class="field">
                            <label class="label">Capa da publicação</label>
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="imgPost" id="imgPost" accept="image/jpg,image/jpeg,image/png,image/bmp,image/tiff" required>
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Escolha uma imagem...
                                        </span>
                                    </span>
                                    <span class="file-name" id="file-name">
                                        Formatos permitidos: <strong> jpg</strong>,<strong> jpeg</strong> ou<strong> png</strong>. O tamanho da imagem deve ser de <strong>240px / 240px</strong>.
                                    </span>
                                </label>
                            </div>
                        </div>
                        <p class="help">A imagem será utilizada como capa para a sua publicação.</p>
                        <br>

                        <div class="field">
                            <label class="label">Descrição da postagem</label>
                            <textarea class="textarea" maxlength="80" rows="2" name="descricaoPostagem" placeholder="Descrição da postagem. Obs.: máximo de 80 palavras" id="field" onkeyup="countChar(this)" required></textarea>
                            <p>
                                Carateres restantes: <strong class="charNum"></strong>
                            </p>
                        </div>

                        <!-- TEXTAREA -->
                        <div class="field">
                            <label class="label">Corpo da publicação</label>
                            <textarea id="full-featured-non-premium" name="corpoPost" required><p style="text-align: center; font-size: 15px;">
                        </textarea>
                        </div>

                        <!-- Botão publicar -->
                        <p class="buttons">
                            <button type="submit" class="button is-medium is-primary is-fullwidth telaCarregamento">
                                <span class="icon">
                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                </span>
                                <span>Publicar</span>
                            </button>
                        </p>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>


    tinymce.init({
        selector: 'textarea#full-featured-non-premium',
        language: 'pt_BR',
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        importcss_append: true,
        file_picker_callback: function(callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {
                    text: 'My text'
                });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {
                    alt: 'My alt text'
                });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {
                    source2: 'alt.ogg',
                    poster: 'https://www.google.com/logos/google.jpg'
                });
            }
        },

        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 500,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image imagetools table',

        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    });
</script>
@endsection