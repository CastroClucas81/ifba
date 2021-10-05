<!-- PESQUISAR -->
<div class="card">
    <div class="card-content">
        <form action="{{ route('inicio')}}" method="get">
            <div class="field has-addons">
                <div class="control">
                    <input class="input" type="text" name="campoPesquisar" placeholder="Pesquise aqui...">
                </div>
                <div class="control">
                    <button type="submit" name="btnPesquisar" class="button is-primary">
                        <span class="icon is-small">
                            <i class="fa fa-search"></i>
                        </span>
                        <span>Buscar</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<br>

<!-- VÍDEOS -->
<div class="card">

    <div class="card-content">
        <div class="content">
            <p class="subtitle has-text-left">
                Publicações antigas
            </p>
            <hr>
            @if(count($ultimasPostagens) > 0)
            @foreach ($ultimasPostagens as $post)
            <article class="message is-primary is-small">
                <div class="message-body">
                    <div class="media">
                        <div class="media-left detalhePostLateral">
                            <img src="{{ url('storage/'. str_replace('public/', '', $post->ImgPost)) }}">
                        </div>
                        <div class="media-content">
                            <form action="{{ route('conteudo') }}" method="post">
                                @csrf
                                <input type="hidden" name="idPost" value="{{$post->id}}">
                                <button type="submit" class="btnDetalhePost">
                                    <div class="content has-text-left" style="font-size: 1rem;">
                                        <p class="has-text-weight-bold">
                                            {{ $post->tituloPost }}
                                        </p>
                                        {{ $post->DescricaoPost }}
                                    </div>
                                </button>
                            </form>

                        </div>

                    </div>
                </div>
            </article>
            @endforeach
            @endif

        </div>
    </div>
</div>
<br>