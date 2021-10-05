<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/css/bulma-carousel.min.css" />
<script defer src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>

@if(count($posts) > 0)
<section class="section">
    <div class="is-clipped">
        <div id="slider">
            @foreach ($posts as $post)
            <div class="card mr-2">
                <div class="card-image">
                    <figure class="image is-16by9 is-covered">
                        <img src="{{ url('storage/'. str_replace('public/', '', $post->ImgPost)) }}">
                    </figure>
                </div>
                <div class="card-content">
                    <form action="{{ route('conteudo') }}" method="post">
                        <div class="item__title">
                            @csrf
                            <input type="hidden" name="idPost" value="{{$post->id}}">
                            <button type="submit" class="btnDetalhePost" style="margin-left: -6px;">
                                <p class="content has-text-justified is-uppercase has-text-weight-bold">
                                    {{ $post->tituloPost }}
                                </p>
                            </button>
                        </div>
                    </form>
                    <div class="item__description">
                        {{ $post->DescricaoPost }}
                    </div>

                </div>
            </div>
            @endforeach
        </div>
</section>

@endif

<script>
    document.addEventListener('DOMContentLoaded', () => {
        bulmaCarousel.attach('#slider', {
            slidesToScroll: 1,
            slidesToShow: 3,
            infinite: true,
            autoplay: true,
        });
    });
</script>

<!--
    <div class="card">
                    <div class="card-content">
                        <div class="content">
                            <p class="title has-text-left is-size-4">
                                Notícias antigas
                            </p>
                            <hr>

                            <div class="columns">
                                <div class="column is-6">
                            
    <article class="message is-primary is-small">
        <div class="message-body">
            <div class="media">
                <div class="media-left">
                    <img src="https://bulma.io/images/placeholders/64x64.png">
                </div>
                <div class="media-content">
                    <div class="content has-text-left">
                        <p>
                            <span class="tag is-primary">AGRICULTURA</span>
                        </p>
                        Vídeo: Quilombo Terra Livre: Convocatória
                    </div>
                </div>

            </div>
        </div>
    </article>


    <article class="message is-primary is-small">
        <div class="message-body">
            <div class="media">
                <div class="media-left">
                    <img src="https://bulma.io/images/placeholders/64x64.png">
                </div>
                <div class="media-content">
                    <div class="content has-text-left">
                        <p>
                            <span class="tag is-primary">CULTURA</span>
                        </p>
                        Notícia: Agroecologia e Produção Orgânica viram lei em
                        Pernambuco.
                    </div>
                </div>

            </div>
        </div>
    </article>


    <article class="message is-primary is-small">
        <div class="message-body">
            <div class="media">
                <div class="media-left">
                    <img src="https://bulma.io/images/placeholders/64x64.png">
                </div>
                <div class="media-content">
                    <div class="content has-text-left">
                        <p>
                            <span class="tag is-primary">CULTURA</span>
                        </p>
                        Notícias: RELAÇÕES DIPLOMÁTICAS - Erosão na parceria entre China
                        e a cooperação Sul Global.
                    </div>
                </div>

            </div>
        </div>
    </article>
    </div>

    <div class="column">

        <article class="message is-primary is-small">
            <div class="message-body">
                <div class="media">
                    <div class="media-left">
                        <img src="https://bulma.io/images/placeholders/64x64.png">
                    </div>
                    <div class="media-content">
                        <div class="content has-text-left">
                            <p>
                                <span class="tag is-primary">CULTURA</span>
                            </p>
                            Notícias: Mulheres da Pá Virada é um projeto de documentário que
                            busca dar mais visibilidade.
                        </div>
                    </div>

                </div>
            </div>
        </article>


        <article class="message is-primary is-small">
            <div class="message-body">
                <div class="media">
                    <div class="media-left">
                        <img src="https://bulma.io/images/placeholders/64x64.png">
                    </div>
                    <div class="media-content">
                        <div class="content has-text-left">
                            <p>
                                <span class="tag is-primary">SOCIAL</span>
                            </p>
                            Notícias: Documentário sobre Clementina de Jesus, a rainha do
                            canto negro no Brasil.
                        </div>
                    </div>

                </div>
            </div>
        </article>

        <article class="message is-primary is-small">
            <div class="message-body">
                <div class="media">
                    <div class="media-left">
                        <img src="https://bulma.io/images/placeholders/64x64.png">
                    </div>
                    <div class="media-content">
                        <div class="content has-text-left">
                            <p>
                                <span class="tag is-primary">CULTURA</span>
                            </p>
                            Vídeo: Quilombo Terra Livre: Convocatória.
                        </div>
                    </div>

                </div>
            </div>
        </article>
    </div>

    </div>

    <nav class="pagination" role="navigation" aria-label="pagination">
        <a class="pagination-previous" title="This is the first page">Mais notícias</a>
    </nav>
    </div>
    </div>
    </div>
-->